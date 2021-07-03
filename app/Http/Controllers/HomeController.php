<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    function index() 
    {
        $data = Product::all();
        return view('Home.home',['products'=>$data]);
    }
}
