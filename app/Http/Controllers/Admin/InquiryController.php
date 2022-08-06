<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::all();
        return view('admin.inquiries.index', [
            'inquiries' => $inquiries,
        ]);
    }

    public function composeMail(Inquiry $inquiry)
    {
        return view('admin.inquiries.compose_mail', [
            'inquiry' => $inquiry,
        ]);
    }

    private $subject = "";

    public function sendMail(Inquiry $user, Request $request)
    {
        $to_name = $user->name;
        $to_email = $request->compose_to;
        $this->subject = $request->compose_subject;
        $mail_body = $request->mail_body;
        $data = array('name' => $to_name, "body" => $mail_body);

        Mail::send('users.mail_body', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject($this->subject);
            $message->from('noreply@timetracker.codecloudtech.com', $this->subject);
        });
    }

    public function destroy(Inquiry $inquiry)
    {

        $inquiry->delete();

        session()->flash('success', 'Inquiry deleted successfully!!');
        return back();
    }
}
