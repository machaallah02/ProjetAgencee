<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\property;

class HomeController extends Controller
{
    public function index(){
        $properties= Property::orderBy('created_at', 'desc')->limit(16)->get()->where('sold', false);
        return view('home', ['properties'=>$properties]);
    }
}
