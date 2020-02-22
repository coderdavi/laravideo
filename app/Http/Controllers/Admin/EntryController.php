<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Routing\Redirector;

class EntryController extends Controller
{
    public function  __construct()
    {
        $this->middleware('admin.auth')->except(['loginForm','login']);
    }

    public function index(){
        return view('admin.entry.index');
    }
    public function loginForm(){
        return view('admin.entry.login');
    }
    public function login(Request $request){
       $status = Auth::guard('admin')->attempt(
           ['username'=>$request->input('username'),
           'password'=>$request->input('password'),
               ]);
       if ($status){
           return redirect('/admin/index');
       }
       session()->flash('error','用户名或者密码错误');
       return back()->withInput();
    }

    /**退出
     * @return RedirectResponse|Redirector
     */
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
