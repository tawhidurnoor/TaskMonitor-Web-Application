<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\TimeTracker;
use Illuminate\Support\Facades\Auth;

class EmployeeProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('project_people.user_id', '=', Auth::user()->id)
            ->join('project_people', 'project_people.project_id', '=', 'projects.id')
            ->selectRaw('projects.*')
            ->get();
        return view('backend.employee_module.project.index', [
            'projects' => $projects,
        ]);
    }

    public function timeTracker(Project $project, Request $request)
    {
        $date = null;

        // $timeTrackers = TimeTracker::with(['screenshots' => function ($q) {
        //     $q->latest();
        // }])
        //     // ->whereIn('project_id', $project_ids)
        //     ->where('user_id', Auth::user()->id)
        //     ->whereHas('project', function ($q) {
        //         $q->where('user_id', Auth::user()->id);
        //     })
        //     ->orderBy('id', 'desc');

        $timeTrackers = TimeTracker::where('project_id', $project->id)
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc');

        if (isset($request->date)) {
            $timeTrackers->whereDate('start', $request->date);
            $date = $request->date;
        }

        $timeTrackers = $timeTrackers->get();

        // $user = User::findOrFail($employee->employee_id);
        $user = Auth::user();

        return view('backend.employee.timeTracker', [
            'timeTrackers' => $timeTrackers,
            'user' => $user,
            'date' => $date,
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
}
