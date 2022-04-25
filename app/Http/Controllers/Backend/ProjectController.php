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

        $projects = Project::where('company_id', $company->id)->get();
        return view('backend.project.index',[
            'projects' => $projects,
            'company' => $company,
        ]);
    }

    public function create(Request $request)
    {
        # code...
    }
}
