<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Stock;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = request('id');

        $products = Products::find($productId);
        $stock = Stock::find($productId);

        $cart = Session::get('cart', []);
        $cart[$productId] = [
            'title' => $products['title'],
            'description' => $products['description'],
            'price' => $products['price'],
            'quantity' => 1,
            'stock' => $stock['stockBalance'],
        ];
        Session::put('cart', $cart);

        $previousUrl = url()->previous();

        return redirect($previousUrl);
    }

    public function showCart($outOfStock = null)
    {
        $cartItems = Session::get('cart');
        $totalPrice = 0;

        if(isset($cartItems)) {
            foreach($cartItems as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }

        // dd($cartItems);
    
        return view('cart', [
            'cartItems' => $cartItems, 
            'cart' => $cartItems, 
            'total' => $totalPrice
        ]);
    }

    public function cartElemDel(Request $request) {
        $productId = request('id');

        Session::forget("cart." . $productId);

        return redirect('/cart');
    }

    public function editQuantity() {
        $request = request();
        $previousUrl = url()->previous();

        $cartElem = Session::get('cart.' . $request['item']);
        
        if($cartElem['quantity'] == 1 && $request['action'] == 'minus') {
            Session::forget('cart.' . $request['item']);
            return redirect($previousUrl);
        }
        if($request['action'] == 'minus') {
            $cartElem['quantity']--;
            Session::put('cart.' . $request['item'], $cartElem);
            return redirect($previousUrl);
        }
        if($request['action'] == 'plus') {
            $cartElem['quantity']++;
            Session::put('cart.' . $request['item'], $cartElem);
            return redirect($previousUrl);
        }
    }
}
