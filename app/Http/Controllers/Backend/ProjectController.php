<?php

namespace App\Http\Controllers\Backend;

use App\Company;
use App\Http\Controllers\Controller;
use App\Project;
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
