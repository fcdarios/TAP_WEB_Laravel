<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function hello2(){
        return "Hola mundo 2";
    }
    public function hello3(){
        return view("hello3");
    }
    public function home(){
        return view("home");
    }
    public function services(){
        return view("services");
    }
    public function products(){
        return view("products");
    }
    public function products_details($id){
        $template_name = "";
        switch ($id) {
            case 1:
                $template_name = "product1";
                break;
            case 2:
                $template_name = "product2";
                break;
            case 3:
                $template_name = "product3";
                break;
            default:
                # code...
                break;
        }
        return view($template_name);
    }
    public function faq(){
        return view("faq");
    }
    public function contacts(){
        return view("contacts");
    }
}
