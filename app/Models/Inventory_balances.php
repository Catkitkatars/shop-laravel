<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory_balances extends Model
{
    use HasFactory;


    protected $table = 'stock';

    protected $fillable = ['productId', 'stockBalance']; 
}
