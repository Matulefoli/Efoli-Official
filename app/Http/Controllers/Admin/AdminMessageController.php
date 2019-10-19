<?php

namespace App\Http\Controllers\Admin;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\EfoliMail;

class AdminMessageController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function show(){
        $this->pageTitle='Message';
        $this->repliedmessages=ContactUs::orderBy('created_at','desc')->where('status',1)->paginate(9);
        $this->importantmessages=ContactUs::orderBy('created_at','desc')->where('status',2)->paginate(9);
        $this->ignoredmessages=ContactUs::orderBy('created_at','desc')->where('status',0)->paginate(9);
        $this->messages=ContactUs::orderBy('created_at','desc')->paginate(9);
        return view('admin.message.view',$this->data);
    }
    public function send_group(Request $request){

        $this->validate($request,[
            'subject'=>'required',
            'text'=>'required'
        ]);
        if(sizeof($request->emails)>0){
            foreach($request->emails as $email){
                Mail::to($email)
                ->send(new EfoliMail($request->subject,$request->text));
            }
        }
        return 'success';
    }
    public function del_message($id){
       
        ContactUs::destroy($id);
        Session::flash('message','Successful');
        return redirect()->back();
    }
    public function mark_imp($id){
        $message=ContactUs::find($id);
        if($message->status==2){
            $message->status=0;
        }else{
            $message->status=2;
        }
        $message->save();
        return redirect()->back();
    }
    public function mark_ing($id){
        $message=ContactUs::find($id);
        if($message->status==0){
            $message->status=2;
        }else{
            $message->status=0;
        }
        $message->save();
        return redirect()->back();
    }
}
