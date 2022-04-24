<?php

namespace App\Http\Controllers\frontend;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $companies =  Company::where('owner_user_id', $user_id)->get();
        return view('frontend.company.index',[
            'companies' => $companies
        ]);
    }

    public function create()
    {
        return view('frontend.company.create');
    }

    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;

        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploaded_files/company_logos/', $filename);

            $company->company_logo = $filename;
        }

        $company->owner_user_id = Auth::user()->id;

        if ($company->save()) {
            session()->flash('success', 'Company added successfully.');  
        } else {
            session()->flash('warning', 'Errot adding company!! Please try again later.');  
        }

        return redirect()->route('company.index');
    }

    public function edit(Company $company)
    {
        return view('frontend.company.edit',[
            'company' => $company
        ]);
    }
}
