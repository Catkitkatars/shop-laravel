<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory_balances extends Model
{
    use HasFactory;


    protected $table = 'inventory_balances';

    protected $fillable = ['title', 'inventory_balances']; 
}
