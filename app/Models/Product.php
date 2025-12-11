<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_name',
        'product_code',
        'product_price',
        'product_quantity',
        'product_image'
    ];
}
