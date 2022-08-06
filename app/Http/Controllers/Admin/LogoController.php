<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Logo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::all();
        return view('admin.logos.index', [
            'logos' => $logos,
        ]);
    }

    public function update(Request $request)
    {
        if ($request->hasFile('logo')) {

            $logo = Logo::where('logo_name', $request->logo_name)->first();
            $logo = Logo::findOrFail($logo->id);

            File::delete('assets_backend/media/logos/', $logo->image);

            $file = $request->file('logo');
            $extention = $file->getClientOriginalExtension();

            //naming file
            $filename = time() . '_' . Auth::user()->id . '.' . $extention;
            $file->move('assets_backend/media/logos/', $filename);

            $logo->image = $filename;
            $logo->save();
        }

        return redirect()->back();
    }
}
