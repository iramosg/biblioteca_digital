<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Categorias;

class HomeController extends Controller
{

    //Views
    public function index()
    {
        $categorias = Categorias::lista();
        return view('welcome', compact('categorias'));
    }

    //End Views
}
