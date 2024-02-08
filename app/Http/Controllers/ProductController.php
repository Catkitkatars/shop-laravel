<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Stock;

class ProductController extends Controller
{
    public function productPage() {
        $id = request()->id;
        $product = Products::find($id);
        $stock = Stock::where('productId', $id)->first();

        return view('productCard', [
            'product' => $product, 
            'stock' => $stock['stockBalance'],
        ]);
    }
}
