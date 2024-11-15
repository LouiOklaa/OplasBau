<?php

namespace App\Http\Controllers;

use App\Models\EmailLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function index()
    {
        $latestEmails = EmailLog::orderBy('sent_at', 'desc')->paginate(12);

        return view('emails.show_all_messages', compact('latestEmails'));
    }

    public function viewMessage($id){

        $message = EmailLog::where('id', $id)->first();

        return view('emails.show_message', compact('message'));
    }
}
