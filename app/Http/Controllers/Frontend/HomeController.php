<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Inquiry;
use App\Page;

class HomeController extends Controller
{
    function index()
    {
        return view('frontend.welcome');
    }

    public function page($page_slug)
    {
        $page = Page::where('slug', $page_slug)->firstOrFail();
        return view('frontend.page', [
            'page' => $page
        ]);
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function stoteContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $inquiry = new Inquiry();
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->subject = $request->subject;
        $inquiry->message = $request->message;

        $name = $inquiry->name;
        // $inquiry->save();

        // session()->flash('success', 'Inquary submitted successfully.');

        // return view('frontend.contact', [
        //     'name' => $name,
        // ]);
        return redirect()->back()->with($name);
    }
}
