<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class CreateProduct extends Component
{
    public $title = 'Buat Produk';
    public $brand_id;
    public $category_id;
    public $name;
    public $slug;
    public $description;
    public $image;
    public $price;
    public $sale_price;

    

    protected $rules = [
        'brand_id' => 'required|exists:brands,id',
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|min:3|max:255',
        'slug' => 'required|min:3|max:255|unique:products,slug',
        'description' => 'nullable|min:3|max:255',
        'image' => 'nullable|image|max:1024',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric|min:0',
    ];

    public function mount()
    {
        //
    }


    public function render()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('livewire.create-product',
            compact('brands', 'categories')
        )->layout('components.layouts.app', [
            'title' => $this->title
        ]);
    }
}
