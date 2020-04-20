<?php

namespace App\Http\Controllers;

use App\About;
use App\Blog;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function home(){
        return view("business-casual/home");
    }
    public function about(){
        $about = About::all();
        return view("business-casual/about", ['about'=>$about]);
    }
    public function blog(){
        $posts = Blog::all();
        return view("business-casual/blog", ['posts'=>$posts]);
    }

    public function contact(){
        return view("business-casual/contact");
    }
}
