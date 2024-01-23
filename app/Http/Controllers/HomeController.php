<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{   

    public function home() {

        if (auth()->check()) {
            $user = auth()->user();
            return view('home', ['user' => $user]);
        } 
        else 
        {
            return view('home', []);
        }
    }

}
