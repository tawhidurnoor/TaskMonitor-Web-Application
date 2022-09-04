<?php

namespace App\Exports;

use App\TimeTracker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TimeTrackersExport implements FromCollection, WithHeadings
{
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
        // return TimeTracker::all();
        $timeTrackers = TimeTracker::join('users', 'users.id', 'time_trackers.user_id')
            ->join('projects', 'projects.id', 'time_trackers.project_id')
            ->selectRaw('time_trackers.id, projects.title, users.name, time_trackers.task_title, time_trackers.start, time_trackers.end')
            ->get();

        return $timeTrackers;
    }
}
