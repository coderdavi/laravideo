<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class CommonController extends Controller
{
    public function  __construct()
    {
        $this->middleware('admin.auth');
    }
    protected  function success($message){
        return response()->json(['message'=>$message,'valid'=>1]);
    }
    protected  function error($message){
        return response()->json(['message'=>$message,'valid'=>0]);
    }
}
