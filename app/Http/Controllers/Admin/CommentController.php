<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\ImageGallery;
use Session;

class CommentController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function comment(){
        $this->pageTitle='Comments';
        $this->comments=Comment::get();
        return view('admin.comment.view',$this->data);
    }
    public function comment_save(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'comment'=>'required',
        ]);
        if($request->hasFile('image')){
            $comment= new Comment;
            $comment->user_name=$request->name;
            $comment->comment=$request->comment;
            $comment->star_rating=$request->rating;
            $comment->save();
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $path=public_path('comment');
            $image->move($path, $filename);
            $img= new ImageGallery;
            $img->model_type='App\Comment';
            $img->model_id=$comment->id;
            $img->image='comment/'.$filename;
            $img->save();
            Session::flash('message','Success');
            return redirect()->back();
        }else{
            return 'user icon please';
        }
    }
    public function comment_del($id){
        Comment::destroy($id);
        Session::flash('message','Success');
        return redirect()->back();
    }

}
