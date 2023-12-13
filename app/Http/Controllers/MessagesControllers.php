<?php

namespace App\Http\Controllers;

use App\Mail\MailRecieved;
use Illuminate\Support\Facades\Mail;

class MessagesControllers extends Controller
{
    public function store(){

        $message = request()->validate([
            'nombre' => 'required',
            'email'=>'required|email',
            'asunto'=>'required',
            'mensaje'=> ['required','min:3']
        ],[
            'nombre.required'=>__('I need your name')
    ]);
    Mail::to('wilder.mayta.btsoft@gmail.com')->send(new MailRecieved($message));
        return new MailRecieved($message);
        // return "Mensaje enviado";
    }
}
