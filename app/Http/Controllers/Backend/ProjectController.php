<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\User;
use App\Staff;
use App\Company;
use App\Project;
use Carbon\Carbon;
use App\Screenshot;
use App\TimeTracker;
use App\ProjectStaff;
use App\ProjectPeople;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        if (Auth::user()->email_verified_at == null && Auth::user()->login_method == 'email') {
            return redirect()->route('profile.index');
        }

        $lastSunday = new Carbon();
        $lastSunday = Carbon::createFromTimeStamp(strtotime("last Sunday", $lastSunday->timestamp));
        $projects = auth()->user()->projects()->with('projectPeople.user.employee')->with(['projectPeople.timeTrackers' => function ($q) use ($lastSunday) {
            $q->whereDate('start', '>=', $lastSunday)->latest();
        }])->get();
        // dd($projects);
        return view('backend.active_projects.active_project_index')->with([
            'projects' => $projects
        ]);

        // $projects = Project::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        // return view('backend.project.index', [
        //     'projects' => $projects,
        // ]);
    }

    public function details($id)
    {
        $id = decrypt($id);
        $project = Project::findOrFail($id);
        $projectPeople = ProjectPeople::where('project_id', $id)
            ->join('users', 'users.id', 'project_people.user_id')
            ->selectRaw('users.name, users.email, users.profile_picture, project_people.id, project_people.user_id, project_people.is_active')
            ->get();

        return view('backend.project.details', [
            'project' => $project,
            'projectPeople' => $projectPeople
        ]);
    }


    public function searchPeople(Request $request, $id)
    {
        $id = decrypt($id);
        $serach_query = $request->search;

        $users = User::join('employees', 'employees.employee_id', 'users.id')
            ->where('employees.employer_id', Auth::user()->id)
            ->where('employees.is_archived', 0)
            ->where(function ($q) use ($serach_query) {
                $q->where('email', 'LIKE', '%' . $serach_query . '%')->orWhere('name', 'LIKE', '%' . $serach_query . '%');
            })
            ->selectRaw('users.*')
            ->get();

        foreach($users as $u => $user) {
            if(ProjectPeople::where('user_id', $user->id)->where('project_id', $id)->count() > 0) {
                unset($users[$u]);
            }
        }
        
        return view('backend.project.add_user', [
            'users' => $users,
            'project_id' => $id,
        ]);
    }

    public function addPeople(Request $request, $id)
    {
        $project_id = decrypt($id);
        $user_id = $request->usere_id;

        $project_people = new ProjectPeople();
        $project_people->project_id = $project_id;
        $project_people->user_id = $user_id;
        $project_people->save();

        return $this->details($id);
    }

    public function removeProjectPeople(Request $request)
    {
        $projectPerson = ProjectPeople::findOrFail($request->id);
        $projectPerson->is_active = false;
        $projectPerson->save();
        return redirect()->back();
    }

    public function reassignProjectPeople(Request $request)
    {
        $projectPerson = ProjectPeople::findOrFail($request->id);
        $projectPerson->is_active = true;
        $projectPerson->save();
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

        $project->save();

        //Adding creator to project
        $project_people = new ProjectPeople();
        $project_people->project_id = $project->id;
        $project_people->user_id = Auth::user()->id;
        $project_people->save();

        // if ($project->save()) {
        //     session()->flash('success', 'Project added successfully.');
        // } else {
        //     session()->flash('warning', 'Errot adding project!! Please try again later.');
        // }

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

    public function timeTracker($project, $employee)
    {
        $project_id = decrypt($project);
        $employee_id = decrypt($employee);

        $project = Project::findOrFail($project_id);

        $projectPeople = ProjectPeople::where('project_id', $project_id)
            ->join('users', 'users.id', 'project_people.user_id')
            ->selectRaw('users.name, users.email, users.profile_picture, project_people.id, project_people.user_id')
            ->get();

        // $timeTrackers = TimeTracker::where('project_id', $project_id)
        //     ->where('user_id', $employee_id)
        //     ->get();

        $timeTrackers = TimeTracker::where([
            'project_id' => $project_id,
            'user_id' => $employee_id
        ])
            ->orderBy('id', 'desc')
            ->get();

        $user = User::findOrFail($employee_id);

        return view('backend.project.timeTracker', [
            'timeTrackers' => $timeTrackers,
            'user' => $user,
            'project' => $project,
            'projectPeople' => $projectPeople
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
