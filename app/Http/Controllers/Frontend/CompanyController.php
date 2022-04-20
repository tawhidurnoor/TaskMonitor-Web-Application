<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        # code...
    }

    public function create()
    {
        return view('frontend.company.create');
    }
}
