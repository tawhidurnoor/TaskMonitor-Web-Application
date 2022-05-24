<?php

namespace App\Http\Controllers\Backend;

use App\Company;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectPeople;
use App\ProjectStaff;
use App\Screenshot;
use App\Staff;
use App\TimeTracker;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('backend.project.index',[
            'projects' => $projects,
        ]);
    }

    public function details($id)
    {
        $id = decrypt($id);
        $project = Project::findOrFail($id);
        $projectPeople = ProjectPeople::where('project_id', $id)
        ->join('users', 'users.id', 'project_people.user_id')
        ->selectRaw('users.first_name, users.last_name, users.profile_picture, project_people.id')
        ->get();

        return view('backend.project.details', [
            'project' => $project,
            'projectPeople' => $projectPeople
        ]);
    }

    public function storeStaff(Request $request)
    {
        $project_staff_count = ProjectStaff::where('staff_id', $request->staff_id)->where('project_id', $request->project_id)->count();
        if($project_staff_count > 0){
            session()->flash('warning', 'Staff already added');
            return redirect()->back();
        }

        $project_staff = New ProjectStaff();
        $project_staff->staff_id = $request->staff_id;
        $project_staff->project_id = $request->project_id;

        if ($project_staff->save()) {
            session()->flash('success', 'Staff added successfullt.');
        } else {
            session()->flash('warning', 'Errot adding staff!! Please try again later.');
        }

        return redirect()->back();
    }

    public function project_staff_destroy(ProjectStaff $project_staff)
    {
        if ($project_staff->delete()) {
            session()->flash('success', 'Staff deleted successfullt.');
        } else {
            session()->flash('warning', 'Errot deleting staff!! Please try again later.');
        }

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $project = new Project();
        $project->title = $request->project_title;
        $project->description = $request->project_description;
        $project->user_id = Auth::user()->id;

        if ($request->hasFile('project_logo')) {
            $file = $request->file('project_logo');
            $extention = $file->getClientOriginalExtension();

            //naming file
            $project_title = $project->title;
            $project_title = explode(" ", $project_title);
            $project_title = $project_title[0];
            $project_title = strtolower($project_title);

            $filename = time() . '_' . $project_title . '_' . Auth::user()->id . '.' . $extention;
            $file->move('uploaded_files/project_logo/', $filename);

            $project->project_logo = $filename;
        }

        if ($project->save()) {
            session()->flash('success', 'Project added successfully.');
        } else {
            session()->flash('warning', 'Errot adding project!! Please try again later.');
        }

        return redirect()->route('project.index', $request->company_id);
    }

    public function update(Request $request, Project $project)
    {
        $project->title = $request->title;
        $project->description = $request->description;

        if ($project->save()) {
            session()->flash('success', 'Project updated successfully.');
        } else {
            session()->flash('warning', 'Errot updating project!! Please try again later.');
        }

        return redirect()->back();
    }

    public function destroy(Project $project)
    {
        if ($project->delete()) {
            session()->flash('success', 'Project deleted successfully.');
        } else {
            session()->flash('warning', 'Errot deleting project!! Please try again later.');
        }

        return redirect()->back();
    }

    public function timeTracker($project, $staff)
    {
        $project_id = $project;
        $project = Project::findOrFail($project_id);

        $timeTrackers = TimeTracker::where('project_id', $project_id)
        ->where('staff_id', $staff)
        ->get();
        
        $staff = User::findOrFail($staff);

        return view('backend.project.timeTracker',[
            'timeTrackers' => $timeTrackers,
            'staff' => $staff,
            'project' => $project
        ]);
    }

    public function screenShot($timetracker)
    {
        $screenshots = Screenshot::where('time_tracker_id', $timetracker)->get();
        return view('backend.project.screenshot', [
            'screenshots' => $screenshots
        ]);
    }
}
