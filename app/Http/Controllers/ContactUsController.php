<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontBaseController;
use App\Setting;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\InstantEfoliMessage;
use Exception;

class ContactUsController extends FrontBaseController
{
    public function __construct(){
        parent::__construct();
    }
    public function save_message(Request $request){
        $this->validate($request,[
            'message'=>'required',
            'email'=>'required',
            'subject'=>'required'
        ]);
        
        $efoli=Setting::first();
        if($efoli->ws_email==null){
            $efoli_email='efoli@gmail.com';
        }else{
            $efoli_email=$efoli->ws_email;
        }
       
        $contact=new ContactUs;
        $contact->message=$request->message;
        $contact->sender_email=$request->email;
        $contact->receiver_email=$efoli_email;
        $contact->sender_name=$request->name;
        $contact->save();
        try{
            Mail::to($request->email)
            ->send(new InstantEfoliMessage($contact));
        }
        catch(Exception $ch){
            return 'we have recieved your message. we will contact you if needed';
        }
        
        return redirect('thankyou');
    }
    public function thankyou(){
        Session::flash('thankyou','Thank YOU');
        $this->pageTitle='Thank YOU';
        return view('thankyou',$this->data);
    }
}
