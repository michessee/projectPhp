<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index(){

        Mail::to("testing-fc82f2@inbox.mailtrap.io")->send(new SendEmail());

        return view('send_email');

    }
}
