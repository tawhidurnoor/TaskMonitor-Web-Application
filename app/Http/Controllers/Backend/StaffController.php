<?php

namespace App\Http\Controllers\Backend;

use App\Company;
use App\Http\Controllers\Controller;
use App\Staff;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index_company(Company $company)
    {
        if (Auth::user()->id != $company->owner_user_id) {
            abort(403, 'Unauthorized action.');
        }

        $staffs = Staff::where('company_id', $company->id)->get();

        return view('backend.staff.index',[
            'staffs' => $staffs,
            'company' => $company,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $company;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::where('email', $request->email)->count() > 0){
            session()->flash('warning', 'There is already a user registered using this email');
        }elseif(strlen($request->password) < 8){
            session()->flash('warning', 'Password must be at least 8 character long');
        }elseif( strcmp($request->password, $request->confirm_password) != 0){
            session()->flash('warning', 'Password did not match');
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->gender = $request->gender;

            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $extention = $file->getClientOriginalExtension();

                $owner_user_id = Auth::user()->id;
                $staff_name = $request->name;
                $single_names = explode(" ", $staff_name);
                $first_name = $single_names[0];
                $first_name = strtolower($first_name);
                $reversed_first_name = strrev($first_name);

                $filename = time() . '_' . $reversed_first_name . '_' . $owner_user_id . '.' . $extention;
                $file->move('uploaded_files/profile_pictures/', $filename);

                $user->profile_picture = $filename;
                
            }

            $user->user_type = 'Staff';
            $user->password = Hash::make($request->password);
            $user->save();

            $staff = new Staff();
            $staff->staff_user_id = $user->id;
            $staff->company_id = $request->company_id;
            $staff->save();
            session()->flash('success', 'Staff added successfully!');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $user = User::findOrFail($staff->staff_user_id);

        if($user->delete() && $staff->delete()){
            session()->flash('success', 'Staff deleted successfully!');
        }else{
            session()->flash('warning', 'Error deleting staff!');
        }

        return redirect()->back();
    }
}
