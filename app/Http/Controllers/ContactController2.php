<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController2 extends Controller
{
    function store(Request $request)
    {
    	
    	$this->validate($request,[
           'family_name'=>'required',
           'first_name'=>'required',
           'email'=> 'required|email',
           'message'=>'required'
    		]);


          
   
    	Mail::send('frontView.dynamic_email_template',
    		[
    		'msg'    =>$request->message
    		],function($mail) use($request)
    		          {
    		         $mail->from($request->email,$request->family_name);
    		         $mail->to('bouchekiflatifa13@gmail.com')->subject('Content Message');
    		         
    		          });
    	return redirect()->back()->with('fash_message','Thank you for your message');
    	
    	//dd($request->all());
    }
    
}