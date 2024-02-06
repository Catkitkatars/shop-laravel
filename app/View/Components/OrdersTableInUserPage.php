<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Order;
use App\Models\OrdersItem;

class OrdersTableInUserPage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->userOrders = Order::where('userId', request('id'))->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.orders-table-in-user-page', ["userOrders" => $this->userOrders, ]);
    }
}
