<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontBaseController;
use App\Job;
use Session;
use Illuminate\Support\Carbon;
class CareerController extends FrontBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function index(){
        $this->pageTitle='Efoli';
        $today=Carbon::today();
        $this->jobs=Job::where('status',1)
                    ->orderBy('created_at','desc')
                    ->get();
        return view('front.career.index',$this->data);
    }
    public function single($id){
        $this->pageTitle='Efoli';
        $this->job=Job::find($id);
        return view('front.career.single',$this->data);
    }
}
