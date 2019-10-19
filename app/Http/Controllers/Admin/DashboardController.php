<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Admin;
use Auth;
class DashboardController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function login(){
        $this->pageTitle='loginToAdmin';
        return view('admin.login',$this->data);
    } 
    public function loginpost(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
       
        $admin=Admin::where('email',$request->email)->first();
        if (Hash::check($request->password, $admin->password)) {
            Auth::login($admin);
            $ip=$request->ip();
            if($ip!=$admin->ip){
                Auth::logout();
                return 'access denied';
            }
            return redirect('admin/dashboard');
        }
        return redirect()->back()->withInput();
    }
    public function dashboard(){
       
        $this->pageTitle='Admin Dashboard';
        return view('admin.dashboard',$this->data);
    }
}
