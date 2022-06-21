<?php

namespace App\Http\Controllers\Frontend;

use stdClass;
use Carbon\Carbon;
use App\TimeTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Project;

class ChartsController extends Controller
{
    public function timeTrackerBasedHeatmap(Request $request)
    {
        $today = now();
        $fifteenDays = new Carbon($today->format("Y-m-01 H:i:s"));
        $fifteenDays = now();
        $fifteenDays->subDays(30);
        $projects = Project::select('id')->where('user_id', auth()->id())->get()->pluck('id')->toArray();
        if($request->type == 'all'){
            $trackers = TimeTracker::select(DB::raw("TIMESTAMPDIFF(MINUTE,start, end) as datediff, DATE(start) as start, DATE(end) as end"))->whereDate('start', '>=', $fifteenDays)->whereIn('project_id', $projects)->get();
        }else{
            if(!in_array($request->type, $projects)){
                abort(403);
            }
            $trackers = TimeTracker::select(DB::raw("TIMESTAMPDIFF(MINUTE,start, end) as datediff, DATE(start) as start, DATE(end) as end"))->whereDate('start', '>=', $fifteenDays)->where('project_id', $request->type)->get();
        }
        // $trackers = TimeTracker::select(DB::raw("TIMESTAMPDIFF(MINUTE,start, end) as datediff, DATE(start) as start, DATE(end) as end"))->whereDate('start', '>=', $fifteenDays)->where('project_id', $request->type)->get();
        $data = array();
        $iterator = 0;
        for($iterator; $iterator < 31; $iterator++){
            $totalMinutesThisDay = $trackers->where("start", $fifteenDays->format('Y-m-d'))->sum('datediff');
            if(!isset($data[$iterator%7])){
                $data[$iterator%7] = new stdClass;
            }
            $data[$iterator%7]->name= $fifteenDays->englishDayOfWeek;
            if(isset($data[$iterator%7]->data)){
                array_push($data[$iterator%7]->data, array(
                    "x" => "Week {$fifteenDays->weekOfMonth}",
                    "y" => $totalMinutesThisDay,
                    "date" => $fifteenDays->format("d/M/Y")
                ));
            }else{
                $data[$iterator%7]->data[] = array(
                    "x" => "Week {$fifteenDays->weekOfMonth}",
                    "y" => $totalMinutesThisDay,
                    "date" => $fifteenDays->format("d/M/Y")
                );
            }
            $fifteenDays->addDay();
        }
        echo json_encode($data);
    }
}
