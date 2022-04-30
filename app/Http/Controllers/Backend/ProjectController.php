<?php

namespace App\Http\Controllers\Backend;

use App\Company;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectStaff;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Company $company)
    {
        if(Auth::user()->id != $company->owner_user_id){
            abort(403, 'Unauthorized action.');
        }

        $projects = Project::where('company_id', $company->id)->orderBy('id', 'desc')->get();
        return view('backend.project.index',[
            'projects' => $projects,
            'company' => $company,
        ]);
    }

    public function details(Project $project)
    {
        $company = Company::findORFail($project->company_id);
        if(Auth::user()->id != $company->owner_user_id){
            abort(403, 'Unauthorized action.');
        }

        $all_staffs = Staff::where('company_id', $company->id)->get();
        $project_staffs = ProjectStaff::where('project_id', $project->id)->get();

        return view('backend.project.details',[
            'project' => $project,
            'company' => $company,
            'all_staffs' => $all_staffs,
            'project_staffs' => $project_staffs,
        ]);
    }

    public function storeStaff(Request$request)
    {
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

    public function store(Request $request)
    {
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->company_id = $request->company_id;

        if ($project->save()) {
            session()->flash('success', 'Project added successfully.');
        } else {
            session()->flash('warning', 'Errot adding project!! Please try again later.');
        }

        return redirect()->route('project.index', $request->company_id);
    }

    public function show(Project $project)
    {
        return $project;
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
}
