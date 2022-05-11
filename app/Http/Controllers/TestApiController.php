<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectStaff;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestApiController extends Controller
{
    public function dextop_projects(Request $request) {
        $email = $request->email;
        $staff_id = User::where('email', $email)->value('id');
        // $staff_id = null;
        // foreach($staff as $stf){
        //     $staff_id = $stf->id;
        // }
    
        // $project_ids = ProjectStaff::where('staff_id', $staff_id)->selectRaw('project_id')->toSql();
        $project_ids = DB::table('project_staff')
        ->where('staff_id', 1+1)
        ->selectRaw('project_id')
        ->get();
    
        $project_staff_ids_array = [];
    
        foreach($project_ids as $id){
            array_push($project_staff_ids_array, $id->project_id);
        }
    
        $projects = Project::whereIn('id', $project_staff_ids_array)->select('title')->get()->pluck('title');
        return json_encode($projects);
    }
}
