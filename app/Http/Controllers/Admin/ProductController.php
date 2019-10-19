<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ AdminBaseController;
use App\Product;
use Illuminate\Http\Request;
use App\ImageGallery;
use Auth;
use Session;

class ProductController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function store(){
        $this->pageTitle='Add a product';
        return view('admin.product.addform',$this->data);
    }
    public function saveproduct(Request $request){
        
        $this->validate($request,[
            'name'=>'required',
            'link'=>'required'
            
        ]);
        if($request->hasFile('image')){
            $res=Product::store($request);
        }else{
            return 'image required';
        }
        if($res=='success'){
            Session::flash('message','Product Saved successfully');
        }
        else{
            Session::flash('message','Some error occured');
        }
        return redirect()->back();
    }
    public function view(){
        $this->pageTitle='Product List';
        $this->products=Product::orderBy('created_at','desc')->paginate(1);
        return view('admin.product.product_list',$this->data);
    }
    public function delete(Request $request){
        if($request->delete_product_id){
            Product::destroy($request->delete_product_id);
            return redirect()->back();
        }
    }
    public function edit($id){
        $this->pageTitle='Edit a product';
        $this->product=Product::find($id);
        return view('admin.product.Editform',$this->data);
    }
    public function prduct_image_delete($request){
        ImageGallery::destroy($request);
        return redirect()->back();
    }
}
