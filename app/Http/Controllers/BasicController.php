<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Index;
use Illuminate\Contracts\View\View;


class BasicController extends Controller
{
    //public static $navInfo;
   
    //获取nav信息
    public function __construct(){
        
        View::share("navs",$navInfo);
    }
}
