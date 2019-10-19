<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaInfo extends Model
{
    public static function get_meta(){
        $meta=MetaInfo::first();
        
        if($meta->author==''){
            $meta->author='efoli';
           
        }
        if($meta->description==''){
            $meta->description='efoli';
        }
        if($meta->copyright==''){
            $meta->copyright='efoli';
        }
        if($meta->expires==''){
            $meta->expires='34567';
        }

        return $meta;
    }
}
