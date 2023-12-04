<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static $defaultImage = 'assets/placeholder.jpg';

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault([
            'name' => 'No Brand',
        ]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'Uncategorized',
        ]);
    }

    public function getFinalPrice(){
        if($this->sale_price > 0){
            return $this->sale_price;
        }else{
            return $this->price;
        }
    }
}
