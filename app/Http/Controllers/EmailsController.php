<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Gate;

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
        
//        $recipients = explode(", ", $request->recipient);
//        
//        $this->validate($recipients, [
//            'recipients[]' => 'email',
//        ]);
//        die;
        
        $this->validate($request, [
            'recipient' => 'required|email',
            'sender' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

        if ($request->attach) {
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
            Mail::send('emails._email', ['content' => $request->content], function($m) use ($request, $attachs) {
                $m->from(config('mail.username'), $request->sender)
                    ->subject($request->subject)
                    ->to($request->receiver);

                for ($i = 0; $i < sizeOf($attachs); $i++) {
                    $m->attach($attachs[$i]);
                }
            });

            //delete file
            for ($i = 0; $i < sizeOf($filenames); $i++) {
                Storage::disk('local')->delete($filenames[$i]);
            }

            return redirect()->back();
        }

        Mail::send('emails._email', ['content' => $request->content], function ($m) use ($request) {
            $m->from(config('mail.username'), $request->sender);
            $m->to($request->receiver)->subject($request->subject);
        });

        return redirect()->back();
    }

    /**
     * Show the form for creating a new email type 1.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEmail1()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        
        return view('emails._form_email_1');
    }

    public function sendEmail1(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        
        $this->validate($request, [
            'recipient' => 'required',
            'sender' => 'required',
            'date' => 'required',
            'address' => 'required',
        ]);
        
        $data = array(
            'date' => $request->date,
            'address' => $request->address,
        );

        Mail::send('emails._email_1', $data, function ($m) use ($request) {
            $m->from(config('mail.username'), $request->sender);
            $m->to($request->receiver)->subject($request->subject);
        });
    }
}
