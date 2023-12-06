<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static $defaultImage = 'placeholder/product.jpg';

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class)->withDefault([
            'name' => 'No Brand',
        ]);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'Uncategorized',
        ]);
    }

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class)->withDefault([
            'path' => self::$defaultImage,
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
