<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrdersItem;
use Session;


class OrderController extends Controller
{
    public function createOrder() {
        // Проверяем пользователя и что корзина не пустая
        $cart = Session::get('cart', []);
        $user = auth()->user();

        if(!$cart || !$user) {
            return abort(404);
        }

        // Считаем сумму заказа
        $amount = 0;
        foreach($cart as $item) {
            $amount += $item['price'] * $item['quantity'];
        }
        // Создаем заказ и получаем айди этого заказа
        $order = Order::create([
            'userId' => $user->id,
            'amount' => $amount,
            'status' => "assembly",
        ]);

        $orderId = $order->id;
        $orderItems = null;

        // Перебираем элементы корзины и создаем элементы в таблице айтемов заказа
        foreach($cart as $item) {
            $orderItems = OrdersItem::create([
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
