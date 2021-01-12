<?php

namespace App;

use App\Store;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];
    protected $casts = [
        'product_pictures' => 'array',
    ];
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
