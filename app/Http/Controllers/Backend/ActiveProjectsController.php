<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Screenshot;
use App\TimeTracker;
use Illuminate\Support\Facades\Hash;

class ActiveProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastSunday = new Carbon();
        $lastSunday = Carbon::createFromTimeStamp(strtotime("last Sunday", $lastSunday->timestamp));
        $projects = auth()->user()->projects()->with('projectPeople.user.employee')->with(['projectPeople.timeTrackers' => function($q) use($lastSunday){
            $q->whereDate('start', '>=', $lastSunday)->latest();
        }])->get();
        // dd($projects);
        return view('backend.active_projects.active_project_index')->with([
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function timeTrackSeed()
    {
        $today = now();
        $today->subDays(60);
        $screenshots = array(
            '1655548785_dm_time_tracker_no_1.jpg',
            '1655549011_dm_time_tracker_no_2.jpg',
            '1655549133_dm_time_tracker_no_2.jpg',
            '1655549255_dm_time_tracker_no_2.jpg',
            '1655549314_dm_time_tracker_no_3.jpg',
            '1655549377_dm_time_tracker_no_2.jpg',
            '1655549436_dm_time_tracker_no_3.jpg',
            '1655549500_dm_time_tracker_no_2.jpg',
            '1655549559_dm_time_tracker_no_3.jpg',
            '1655549623_dm_time_tracker_no_2.jpg',
            '1655549682_dm_time_tracker_no_3.jpg',
            '1655549748_dm_time_tracker_no_2.jpg',
            '1655549806_dm_time_tracker_no_3.jpg',
            '1655549873_dm_time_tracker_no_2.jpg',
            '1655549879_90-0F-0C-67-DC-A1.jpg',
            '1655549928_dm_time_tracker_no_3.jpg',
            '1655549942_90-0F-0C-67-DC-A1.jpg',
            '1655549995_dm_time_tracker_no_2.jpg',
            '1655550004_90-0F-0C-67-DC-A1.jpg',
            '1655550050_dm_time_tracker_no_3.jpg',
        );
        for($i = 0; $i < 60; $i++){
            $hour = rand(1,8);
            $minute = rand(1,60);
            $start = new Carbon($today->format("Y-m-d H:i:s"));
            $today = $today->addHours($hour);
            $today = $today->addMinutes($minute);
            $end = new Carbon($today->format("Y-m-d H:i:s"));
            print_r("$start\n$end\nHours: $hour & Minutes: $minute\nToday: $today<br>");
            $timeTracker = TimeTracker::create([
                'project_id' => 1,
                'user_id' => 3,
                'project_people_id' => 2,
                'task_title' => "Task $i",
                'start' => $start,
                'end' => $end,
                'created_at' => $start,
            ]);
            $today->addDay();
            $numberOfScreenShots = rand(7,10);
            $diffInMinutes = $start->diffInMinutes($end);
            $minutesToAdd = $diffInMinutes/$numberOfScreenShots;
            $startScreenshot = new Carbon($start->format("Y-m-d H:i:s"));
            for($j = 0; $j < $numberOfScreenShots; $j++){
                $screenshotImageIdx = rand(0,19);
                Screenshot::create([
                    'time_tracker_id' => $timeTracker->id,
                    'user_id' => 3,
                    'image' => $screenshots[$screenshotImageIdx],
                    'created_at' => $startScreenshot,
                ]);
                $startScreenshot->addMinutes($minutesToAdd);
            }
        }
    }
}
