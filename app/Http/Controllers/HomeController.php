<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Stock;
use Session;

class HomeController extends Controller
{

    public function home() {
        $cartElems = Session::get('cart');

        $stock = Stock::select('productId', 'stockBalance')
            ->get();

        $productsWithStock = Products::join('stock', 'products.id', '=', 'stock.productId')
            ->select('products.*', 'stock.stockBalance')
            ->get();


        return view('home', ['products' => $productsWithStock]);
    }

}
