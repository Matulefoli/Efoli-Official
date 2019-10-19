<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Setting;
use Session;
use App\Gellary;
use App\Dialouge;
use App\MetaInfo;

class SettingController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function setting(){
        $this->pageTitle='Settings';
       
        return view('admin.setting.view',$this->data);
    }
    public function change_save(Request $request){
        $setting=Setting::first();
        $data=$request->toArray();
      //  return $request;
        foreach($data as $key=>$value){
            if($key=='_token' || $key=='ws_video' || $key=='ws_header_icon' || $key=='ws_footer_icon' || $key=='ws_logo')continue;
            $setting->$key=$value;
        }
        if($request->ws_video!=null){
            $path=public_path('website/');
            $image=$request->file('ws_video');
            $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
            $image->move($path, $filename);
            $setting->ws_video='website/'.$filename;
        }
        if($request->ws_header_icon!=null){
            $path=public_path('website/');
            $image=$request->file('ws_header_icon');
            $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
            $image->move($path, $filename);
            $setting->ws_header_icon='website/'.$filename;
        }
        if($request->ws_footer_icon!=null){
            $path=public_path('website/');
            $image=$request->file('ws_footer_icon');
            $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
            $image->move($path, $filename);
            $setting->ws_footer_icon='website/'.$filename;
        }
        if($request->ws_logo!=null){
            $path=public_path('website/');
            $image=$request->file('ws_logo');
            $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
            $image->move($path, $filename);
            $setting->ws_logo='website/'.$filename;
        }
        
        
        $setting->save();
        Session::flash('message','successful');
        return redirect()->back();
    }
    public function metas(){
        $this->pageTitle='Metas';
        return view('admin.setting.metas',$this->data);
    }
    public function store_meta(Request $request){
        $this->validate($request,[
            'author'=>'required'
        ]);
        $meta=MetaInfo::first();
        $meta->author=$request->author;
        $meta->description=$request->description;
        $meta->copyright=$request->copyright;
        $meta->cache_control=$request->cache;
        $meta->expires=$request->expires;
        $meta->save();
        return redirect()->back();

    }
    public function gal(){
        $this->pageTitle='Galleries and Dialouge';
        return view('admin.setting.gal_dal',$this->data);
    }
    public function gal_dal_save(Request $request){
        for($i=0;$i<sizeof($request->description);$i++){
            if($request->title[$i]!=''){
                $dialouge=Dialouge::where('title',$request->title[$i])->first();
                if($dialouge){
                    $dialouge->text=$request->description[$i];
                }
                else{
                    $dialouge=new Dialouge;
                    $dialouge->title=$request->title[$i];
                    $dialouge->text=$request->description[$i];
                }
                $dialouge->save();
            }
        }
        if($request->hasFile('image')){
            foreach($request->file('image') as $key=>$image){
                if($request->imagetitle[$key]){
                    $title=Gellary::where('title',$request->imagetitle[$key])->first();
                    if($title){
                        $path=public_path('/gellary/image/');
                        $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
                        $image->move($path, $filename);
                        $title->image='/gellary/image/'.$filename;
                        $title->save();
                    }
                    else{
                        $path=public_path('/gellary/image/');
                        $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
                        $image->move($path, $filename);
                        $img= new Gellary;
                        $img->image='/gellary/image/'.$filename;
                        $img->title=$request->imagetitle[$key];
                        $img->save();
                    }
                }
            }
        }
        
        return redirect('admin/gal_dal_list');
    }
    public function gal_dal_list(){
        $this->pageTitle='Galleries and Dialouge';
        $this->dialouges=Dialouge::get();
        $this->images=Gellary::get();
        return view('admin.setting.gal_dal_list',$this->data);
    }
    public function dia_del($id){
        Dialouge::destroy($id);
        return redirect()->back();
    }
    public function gal_del($id){
        Gellary::destroy($id);
        return redirect()->back();
    }
}
