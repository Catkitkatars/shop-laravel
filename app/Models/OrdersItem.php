<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersItem extends Model
{
    use HasFactory;

    protected $table = 'ordersItem';

    protected $fillable = ['orderId', 'product', 'quantity', 'priceForOne'];
}
