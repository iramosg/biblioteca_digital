<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    //Views
    public function index()
    {
        return view('welcome');
    }

    //End Views
}
