<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\TeamCategory;
use App\ImageGallery;
use App\TeamMemberJoinTable;
use App\TeamMember;
use Session;
class TeamController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function add_team(){
        $this->pageTitle='Add Team';
        $this->teams=TeamCategory::get();
        return view('admin.team.add_team',$this->data);
    }
    public function post(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required'
        ]);
        $team= new TeamCategory;
        $team->category_name=$request->name;
        $team->category_description=$request->description;
        $team->category_priority=$request->serial;
        $team->save();
        foreach($request->file('image') as $image){
            $path=public_path('/team/image');
            $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
            $image->move($path, $filename);
            $img= new ImageGallery;
            $img->model_type='App\Team';
            $img->model_id=$team->id;
            $img->image='/team/image/'.$filename;
            $img->save();
        }
        Session::flash('message','Successful');
        return redirect()->back();
    }
    public function add_member(){
        $this->pageTitle='Team member';
        return view('admin.team.add_member',$this->data);
    }
    public function save_member(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'description'=>'required'
        ]);
        $member= new TeamMember;
        $member->name=$request->name;
        $member->designation=$request->designation;
        $member->description=$request->description;
        $member->hobby=$request->hobby;
        $member->phone=$request->phone;
        $member->email=$request->email;
        $member->education=$request->education;
        $member->save();
        if($request->hasFile('image')){
            $image=$request->file('image');
            $path=public_path('/team/image');
            $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
            $image->move($path, $filename);
            $img= new ImageGallery;
            $img->model_type='App\TeamMember';
            $img->model_id=$member->id;
            $img->image='/team/image/'.$filename;
            $img->save();
        }
        Session::flash('message','Successful');
        return redirect()->back();
    }
    public function manage_team(){
        $this->pageTitle='Add Team';
        $this->members=TeamMember::get();
        $this->teams=TeamCategory::get();
        $this->join_tables=TeamMemberJoinTable::get();
        return view('admin.team.manage',$this->data);
    }
    public function make_connection_team(Request $request){
        $this->validate($request,[
            'team'=>'required',
            'member'=>'required'
        ]);
        $new= new TeamMemberJoinTable;
        $new->team=$request->team;
        $new->member=$request->member;
        $new->save();
        Session::flash('message','Successful');
        return redirect()->back();
    }
    public function team_join_del($id){
        TeamMemberJoinTable::destroy($id);
        Session::flash('message','Successful');
        return redirect()->back();
    }
    public function current_team_view(){
        $this->pageTitle='current_team_view';
        $this->teams=TeamCategory::get(); 
        return view('admin.team.current_team_view',$this->data);
    }
    public function delete($id){
        TeamCategory::destroy($id);
        Session::flash('message','Successful');
        return redirect()->back();
    }
    
}
