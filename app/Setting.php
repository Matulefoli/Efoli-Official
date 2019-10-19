<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public static function get_setting(){
        $setting=Setting::first();
        
        if($setting->ws_logo==''){
            $setting->ws_logo='website/EFOLI Logo.png';
        }
        if($setting->ws_logo==''){
            $setting->ws_logo='website/logo.png';
        }
        if($setting->ws_logo==''){
            $setting->ws_logo='website/logo.png';
        }
        if($setting->ws_logo==''){
            $setting->ws_logo='website/logo.png';
        }
        if($setting->ws_logo==''){
            $setting->ws_logo='website/logo.png';
        }
        if($setting->ws_logo==''){
            $setting->ws_logo='website/logo.png';
        }
        $setting->save();
        return $setting;
    }
}
