<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\MetaInfo;
use App\Setting;
use App\Gellary;
use App\Dialouge;
use App\Product;

class FrontBaseController extends Controller
{
    public $data = [];
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }
    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
    public function __construct()
    {
        $this->meta_data=MetaInfo::get_meta();
        $this->site_setting=Setting::get_setting();
        $this->dialouges=Dialouge::get();
        $this->gellaries=Gellary::get();
        $this->products=Product::get();
    }
}
