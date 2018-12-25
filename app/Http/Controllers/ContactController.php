<?php
namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;



class ContactController extends Controller
{
    function store(Request $request)
    {
    	//si je tapp sur envoyer sans renseigner les champs des msg en rouge s'affiche
    	$this->validate($request,[
           'family_name'=>'required',
           'first_name'=>'required',
           'email'=> 'required|email',
           'message'=>'required'
    		]);


          
    /*	$data =array(
    		'first_name' =>$request->first_name,
    		'family_name'=>$request->family_name,
    		'email'=>$request->email,
            'message'    =>$request->message
    		);
    	 Mail::send('frontView.dynamic_email_template',$data,function($msg) use($data){
                 $msg->to($data['email'],'laravel tuto');
                 $msg->from('bouchekiflatifa13@gmail.com');
                // $msg->message($data['message'],'Laravel msg');

           });
    	 session::flash('fash_message','Thank you for your message');
    	return Redirect()->back();
*/
    	Mail::sent('frontView.dynamic_email_template',
    		[
    		'message'    =>$request->message
    		],function($mail) use($request)
    		          {
    		         $mail->from($request->email,$request->family_name);
    		         $mail->to('bouchekiflatifa13@gmail.com')->subject('Content Message');
    		         
    		          });
    	return Redirect()->back()->with('fash_message','Thank you for your message');
    	
    }
    
}
