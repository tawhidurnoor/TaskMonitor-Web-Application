<?php

namespace App\Http\Controllers\Backend;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $companies =  Company::where('owner_user_id', $user_id)->orderBy('id', 'desc')->get();
        return view('backend.company.index',[
            'companies' => $companies
        ]);
    }
    public function create()
    {
        return view('backend.company.create');
    }

    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;

        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $extention = $file->getClientOriginalExtension();

            $owner_user_id = Auth::user()->id;
            $owner_name = Auth::user()->name;
            $single_names = explode(" ", $owner_name);
            $first_name = $single_names[0];
            $first_name = strtolower($first_name);
            $reversed_first_name = strrev($first_name);

            $filename = time(). '_' . $reversed_first_name . '_'. $owner_user_id .'.' . $extention;
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

    public function show(Company $company)
    {
        return $company;
    }


    public function update(Request $request, Company $company)
    {
        $company->name = $request->name;

        if ($request->hasFile('company_logo')) {

            if(isset($company->company_logo) ){
                unlink('uploaded_files/company_logos/'.$company->company_logo);
            }

            $file = $request->file('company_logo');
            $extention = $file->getClientOriginalExtension();

            $owner_user_id = Auth::user()->id;
            $owner_name = Auth::user()->name;
            $single_names = explode(" ", $owner_name);
            $first_name = $single_names[0];
            $first_name = strtolower($first_name);
            $reversed_first_name = strrev($first_name);

            $filename = time(). '_' . $reversed_first_name . '_'. $owner_user_id .'.' . $extention;
            $file->move('uploaded_files/company_logos/', $filename);

            $company->company_logo = $filename;
        }

        if ($company->save()) {
            session()->flash('success', 'Company updated successfully.');  
        } else {
            session()->flash('warning', 'Errot updating company!! Please try again later.');  
        }

        return redirect()->route('company.index');
    }

    public function destroy(Company $company)
    {
        if(isset($company->company_logo) ){
            unlink('uploaded_files/company_logos/'.$company->company_logo);
        }
        
        if ($company->delete()) {
            session()->flash('success', 'Company deleted successfully.');  
        } else {
            session()->flash('warning', 'Errot deleting company!! Please try again later.');  
        }

        return redirect()->route('company.index');
    }
}
