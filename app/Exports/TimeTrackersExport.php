<?php

namespace App\Exports;

use App\Project;
use App\TimeTracker;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TimeTrackersExport implements FromCollection, WithHeadings
{
    private $user_id;
    private $from_date;
    private $to_date;

    function __construct($user_id, $from_date, $to_date)
    {
        $this->user_id = $user_id;
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Project',
            'Employee',
            'Task Titke',
            'Started',
            'Ended',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //getting project ids of logged in employer's project
        $projects = Project::where('user_id', Auth::user()->id)->get();

        $project_ids_array = [];

        foreach ($projects as $project) {
            array_push($project_ids_array, $project->id);
        }

        // return TimeTracker::all();
        $timeTrackers = TimeTracker::join('users', 'users.id', 'time_trackers.user_id')
            ->join('projects', 'projects.id', 'time_trackers.project_id')
            ->where('time_trackers.user_id', $this->user_id)
            ->whereIn('time_trackers.project_id', $project_ids_array)
            ->whereDate('start', '>=', $this->from_date)
            ->whereDate('start', '<=', $this->to_date)
            ->selectRaw('time_trackers.id, projects.title, users.name, time_trackers.task_title, time_trackers.start, time_trackers.end')
            ->get();

        return $timeTrackers;
    }
}
