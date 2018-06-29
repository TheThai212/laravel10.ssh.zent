<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function post(Request $req){
    	$req->validate([
    		'email'=>'required'
    	]);

    	$data [
    			'email' => $req->email,
    			'subject' => 'test',
    			'bodyMessage' => 'hello'
    	];

    	Maill::send('mail.mail',$data,function($message) use ( $data){
    		$message->from('thethai.nguyen.212@gmail.com','Thienthan212n');
    		$message->to($data['email']);
    		$message->subject($data['subject']);

    	});

    	return redirect()->back();
    }
}
