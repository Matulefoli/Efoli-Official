<?php

namespace App\Http\Controllers;
use App\Http\Controllers\FrontBaseController;
use Illuminate\Http\Request;
use App\Gellary;
use App\Dialouge;
use App\Product;
use Session;

class ContactController extends FrontBaseController
{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->pageTitle='Contact Us';
        
        return view('front.contactus',$this->data);
    }
    public function about(){
        $this->pageTitle='Contact Us';
        // $this->dialouges=Dialouge::get();
        // $this->gellaries=Gellary::get();
        // $this->products=Product::get();
        return view('front.aboutus',$this->data);
    }
}
