<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(){
        if (Auth::check()) {
            return view('posts');
        }
        else{
            return redirect()->route('dashboard');
        }
    }
}
