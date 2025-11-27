<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salesproduct extends Model
{
    protected $fillable=['sale_id','product_id','total','quantity','amount'];

public function shopproduct()
{
    return $this->belongsTo(shopproduct::class, 'product_id');
}


}
