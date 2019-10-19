<?php

namespace App;

use Exception;
use App\ImageGallery;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function store($data){
        try{
           
            $product=new Product;
            $product->name=$data->name;
            $product->link=$data->link;
            $product->status=$data->status;
            if($data->details){
                $product->description=$data->details;
    
            }
            if($data->last_realise){
                $product->last_realize=$data->last_realise;
            }
            $product->save();
            foreach($data->file('image') as $image){
                $path=public_path('/product/image');
                $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
                $image->move($path, $filename);
                $img= new ImageGallery;
                $img->model_type='App\Product';
                $img->model_id=$product->id;
                $img->image='/product/image/'.$filename;
                $img->save();
            }
          
            return 'success';
        }
        catch(Exception $ch){
            return $ch;
        }
      
       
    }
}
