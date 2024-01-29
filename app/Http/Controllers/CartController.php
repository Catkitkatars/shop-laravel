<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = request('id');

        $products = Products::find($productId);

        $cart = Session::get('cart', []);
        $cart[$productId] = [
            'title' => $products['title'],
            'description' => $products['description'],
            'price' => $products['price'],
            'quantity' => 1, 
        ];
        Session::put('cart', $cart);

        $previousUrl = url()->previous();

        return redirect($previousUrl);
    }

    public function showCart()
    {
        $cartItems = Session::get('cart');
    
        return view('cart', ['cartItems' => $cartItems, 'cart' => $cartItems]);
    }

    public function cartElemDel(Request $request) {
        $productId = request('id');

        Session::forget("cart." . $productId);

        return redirect('/cart');
    }
}
