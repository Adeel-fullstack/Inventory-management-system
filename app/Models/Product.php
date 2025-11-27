<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable=['category_id','brand_id','title','description','price','quantity','thumbnail'];


    public function category()
    {
         return $this->belongsTo(Category::class);
    }

    public function brand()
    {
         return $this->belongsTo(Brand::class);
    }
    public  function records(){
          return $this->hasMany(Record::class);
    }
}
