<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Session;

class HomeController extends Controller
{

    public function home() {

        $products = Products::all();
        $cartElems = Session::get('cart');


        if (auth()->check()) {
            $user = auth()->user();
            return view('home', [
                'user' => $user, 
                'products' => $products,
                'cart' => $cartElems,
            ]);
        } 
        else 
        {
            return view('home', ['products' => $products, 'cart' => $cartElems,]);
        }
    }

}
