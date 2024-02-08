<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrdersItem;
use App\Models\Stock;
use Session;


class OrderController extends Controller
{
    public function createOrder() {
        // Проверяем пользователя и что корзина не пустая
        $cart = Session::get('cart', []); // Поправить (см. Request)
        $user = auth()->user(); // Поправить (см. Request)
        //=======================================

        if(!$cart || !$user) {
            return abort(404);
        }

        // Проверяем все ли продукты есть на складе
        $checkOutOfStock = true;
        // + Считаем сумму заказа
        $amount = 0;

        foreach ($cart as $productId => $value) {
            $amount += $cart[$productId]['price'] * $cart[$productId]['quantity'];

            $checkItemOutOfStock = Stock::where('productId', $productId)->first();

            if(($checkItemOutOfStock['stockBalance'] - $cart[$productId]['quantity']) < 0) {
                $checkOutOfStock = false;
                $cart[$productId]['stock'] = $checkItemOutOfStock['stockBalance'];
            }
        }

        if(!$checkOutOfStock) {
            Session::put('cart', $cart);
            return redirect("/cart");
        }
        else 
        {
            foreach ($cart as $productId => $value) {
                Stock::where('id', $productId)->decrement('stockBalance', $cart[$productId]['quantity']);
            }
        }

        // Создаем заказ и получаем айди этого заказа
        $order = Order::create([
            'userId' => $user->id,
            'amount' => $amount,
            'status' => "assembly",
        ]);

        $orderId = $order->id;

        // Перебираем элементы корзины и создаем элементы в таблице айтемов заказа
        foreach($cart as $item) {
            OrdersItem::create([
                'orderId' => $orderId,
                'product' => $item['title'],
                'quantity' => $item["quantity"],
                'priceForOne' => $item["price"],
            ]);
        }

        Session::remove('cart');
        return redirect("/orderDetails?id=" . $orderId);
    }

    public function showOrderDetails() {
        $orderId = request('id');
        $user = auth()->user();

        $order = Order::where('id', $orderId)->first();

        if($order->userId != $user->id) {
            abort(404);
        } 

        $orderDetails = OrdersItem::where('orderId', $orderId)->get();

        return view('orderDetails', [
            'orderId' => $orderId,
            'orderDetails' => $orderDetails
        ]);
    }
}
