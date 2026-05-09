<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesProduct extends Model
{
    protected $table = 'salesproducts';

    protected $fillable=['sale_id','product_id','total','quantity','amount'];

    public function shopproduct()
    {
        return $this->belongsTo(ShopProduct::class, 'product_id');
    }


}
