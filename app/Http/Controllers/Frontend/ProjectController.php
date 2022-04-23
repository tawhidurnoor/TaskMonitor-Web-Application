<?php

namespace App\Http\Controllers\Frontend;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create(Company $company)
    {
        return $company;
    }
}
