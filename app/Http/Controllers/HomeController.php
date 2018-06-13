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
        $classpage = 'index';
        return view('welcome', compact(['categorias', 'classpage']));
    }

    public function escritor()
    {
        $classpage = 'escritor';
        return view('escritor', compact('classpage'));
    }

    public function leitor()
    {
        $classpage = 'leitor';
        return view('leitor', compact('classpage'));
    }

    public function sobre()
    {
        $classpage = 'sobre';
        return view('sobre', compact('classpage'));
    }

    //End Views
}
