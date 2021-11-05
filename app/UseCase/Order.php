<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['publish_at', 'quantidade'];

    public function products() {

        return $this->belongsToMany(Product::class, 'orders_products', 'order', 'product');
    }
}
