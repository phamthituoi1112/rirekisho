<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Gate;
use Session;
use App\User;
use App\Groups;

class EmailsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new email.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        return view('emails.create');
    }

    /**
     * Send email to receiver.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        $errors = array();
        //get email address
        $recipients = explode(",", $request->recipient);

        foreach ($recipients as $recipient) {
            if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                //is group's name?
                $group = Groups::where('name', '=', $recipient)
                        ->with('users')->first();
                //yes
                if ($group) {
                    if ($group->users->count() == 0) {
                        $errors[] = 'No one in ' . $group->name;
                    } else {
                        foreach ($group->users as $user) {
                            //add email address
                            $recipients[] = $user->email;
                        }
                    }
                    //remove group's name
                    $key = array_search($recipient, $recipients);
                    unset($recipients[$key]);
                } else { //NO!
                    $errors[] = 'Recipitent must be email.';
                    return redirect()->back()->withErrors($errors);
                }
            }
        }
        //remove duplicate
        $recipients = array_unique($recipients);

        //check - is there any email address?
        if (sizeOf($recipients) == 0) {
            $errors[] = 'No recipient!';
            return redirect()->back()->withErrors($errors);
        }//end get email address

        $this->validate($request, [
            'sender' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

        if (isset($request->attach[0])) {//if have attach file
            //upload file to server
            $files = $request->attach;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
                $filename = $file->getFilename() . '.' . $extension;

                $attachs[] = url('../storage/app') . '/' . $filename;
                $filenames[] = $filename;
            }

            //send email
            Mail::send('emails._email', ['content' => $request->content], function($m) use ($request, $recipients, $attachs) {
                $m->from(config('mail.username'), $request->sender)
                    ->subject($request->subject)
                    ->to($recipients);

                for ($i = 0; $i < sizeOf($attachs); $i++) {
                    $m->attach($attachs[$i]);
                }
            });

            //delete file
            for ($i = 0; $i < sizeOf($filenames); $i++) {
                Storage::disk('local')->delete($filenames[$i]);
            }

            Session::flash('flash_message', 'Email has been sent.');
            
            if($errors) {
                return redirect()->back()->withErrors($errors);
            } else {
                return redirect()->back();
            }
        }
        //if no attach file
        Mail::send('emails._email', ['content' => $request->content], function ($m) use ($request, $recipients) {
            $m->from(config('mail.username'), $request->sender);
            $m->to($recipients)->subject($request->subject);
        });

        Session::flash('flash_message', 'Email has been sent.');
        
        if($errors){
            return redirect()->back()->withErrors($errors);
        } else {
            return redirect()->back();
        }
        
    }

    /**
     * Show the form for creating a new email type 1.
     *
     * @return view
     */
    public function createFormEmail(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        if ($request->type != null) {
            $email = $request->email;

            $data = array('email' => $email);

            return view('emails._form_email_1')->with($data);
        }
    }

    /**
     * send email type 1.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail1(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $this->validate($request, [
            'recipient' => 'required|email',
            'sender' => 'required',
            'date' => 'required|after:now',
            'time' => 'required',
            'address' => 'required',
        ]);

        $data = array(
            'date' => $request->date,
            'time' => $request->time,
            'address' => $request->address,
        );

        Mail::send('emails._email_1', $data, function ($m) use ($request) {
            $m->from(config('mail.username'), $request->sender);
            $m->to($request->recipient)->subject($request->subject);
        });

//        Session::flash('flash_message', 'Email has been sent.');
    }

    /**
     * get Email address for ajax.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmailAddress(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $key = $request->term;

        $emails = User::select('name', 'email')
            ->where('email', 'like', '%' . $key . '%')
            ->orWhere('name', 'like', '%' . $key . '%')
            ->get();

        $groups = Groups::select('name')
                ->where('name', 'like', '%' . $key . '%')->get();

        foreach ($groups as $group) {
            $emails[] = ['name' => $group->name, 'email' => $group->name];
        }

        return Response::json($emails);
    }
}
