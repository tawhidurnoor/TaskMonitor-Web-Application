<?php

namespace App\Http\Controllers\Frontend;

use stdClass;
use App\Project;
use App\Employee;
use Carbon\Carbon;
use App\TimeTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\String_;

class ChartsController extends Controller
{
    protected $today;
    protected $historyFor;

    function __construct()
    {
        $this->today = now();
        $this->historyFor = new Carbon($this->today->format("Y-m-01 H:i:s"));

        $this->historyFor = now();
        $this->historyFor->subDays(30);
        # code...
    }

    public function projectBasedHeatmap(Request $request)
    {
        $projects = Project::select('id')->where('user_id', auth()->id())->get()->pluck('id')->toArray();
        if($request->type == 'all'){
            $trackers = TimeTracker::select(DB::raw("TIMESTAMPDIFF(MINUTE,start, end) as datediff, DATE(start) as start, DATE(end) as end"))->whereDate('start', '>=', $this->historyFor)->whereIn('project_id', $projects)->get();
        }else{
            if(!in_array($request->type, $projects)){
                abort(403);
            }
            $trackers = TimeTracker::select(DB::raw("TIMESTAMPDIFF(MINUTE,start, end) as datediff, DATE(start) as start, DATE(end) as end"))->whereDate('start', '>=', $this->historyFor)->where('project_id', $request->type)->get();
        }
        echo $this->getTrackerDataJSON($trackers);
    }

    public function employeeBasedHeatmap(Request $request)
    {
        $employee = Employee::where('employer_id', auth()->id())->where('employee_id', $request->employee)->firstOrFail();
        $projects = Project::select('id')->where('user_id', auth()->id())->get()->pluck('id')->toArray();        
        $trackers = TimeTracker::select(DB::raw("TIMESTAMPDIFF(MINUTE,start, end) as datediff, DATE(start) as start, DATE(end) as end"))->whereDate('start', '>=', $this->historyFor)->where('user_id', $request->employee)->get();        
        echo $this->getTrackerDataJSON($trackers);
    }

    public function getTrackerDataJSON($trackers): String
    {
        $data = array();
        for($iterator = 0; $iterator < 31; $iterator++){
            $totalMinutesThisDay = $trackers->where("start", $this->historyFor->format('Y-m-d'))->sum('datediff');
            if(!isset($data[$iterator%7])){
                $data[$iterator%7] = new stdClass;
            }
            $data[$iterator%7]->name= $this->historyFor->englishDayOfWeek;
            if(isset($data[$iterator%7]->data)){
                array_push($data[$iterator%7]->data, array(
                    "x" => "Week {$this->historyFor->weekOfMonth}",
                    "y" => $totalMinutesThisDay,
                    "date" => $this->historyFor->format("d/M/Y")
                ));
            }else{
                $data[$iterator%7]->data[] = array(
                    "x" => "Week {$this->historyFor->weekOfMonth}",
                    "y" => $totalMinutesThisDay,
                    "date" => $this->historyFor->format("d/M/Y")
                );
            }
            $this->historyFor->addDay();
        }
        return json_encode($data);
    }
}
