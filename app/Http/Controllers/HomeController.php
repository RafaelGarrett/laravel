<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        return view('welcome');
    }

    public function __construct() {
        return $this->middleware('auth');
    }
}
