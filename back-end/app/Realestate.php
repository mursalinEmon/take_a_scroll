<?php

namespace App;

use App\Category;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Realestate extends Model
{
    protected $guarded=[];
    protected $casts = [
        'images' => 'array',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }

}
