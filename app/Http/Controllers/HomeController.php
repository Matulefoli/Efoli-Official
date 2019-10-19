<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontBaseController;
use App\Gellary;
use App\Dialouge;
use App\Product;
use App\TeamCategory;
use App\ImageGallery;
use App\TeamMemberJoinTable;
use App\TeamMember;
use Session;
class HomeController extends FrontBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function index()
    {   $this->pageTitle='Efoli';
        $this->comments=Comment::get();
        return view('front.index',$this->data);
    }
    public function logout(Request $request){
        Session::flush();
        return redirect('/');
    }
    public function team(){
        $this->pageTitle='Efoli Team';
        $this->teams=TeamCategory::orderBy('category_priority','desc')->get();
        return view('front.team',$this->data);
    }
}
