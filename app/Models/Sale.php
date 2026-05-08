<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable=['customer_id','total','discount','final','status'];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function salesproducts()
    {
        return $this->hasMany(SalesProduct::class);
    }


   
}

