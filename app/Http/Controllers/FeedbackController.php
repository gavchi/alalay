<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;

class FeedbackController extends Controller
{
    public function postSend(Request $request){
        $data = $request->only('name', 'email', 'text');
        Mail::send('emails.price', $data, function($message)
        {
            $message->from('no-reply@alalay.ru', 'Alalay No-reply');
            $message->to('alalay@alalay.ru');
        });
        return response()->json(['']);
    }
}
