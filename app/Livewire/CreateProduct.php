<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class CreateProduct extends Component
{
    public $title = 'Buat Produk';
    public $brand_id = 1;
    public $category_id = 1;
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

    public function create()
    {
        dd($this->all());
        $this->validate();

        $image = $this->image->store('public/products');

        Product::create([
            'brand_id' => $this->brand_id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $image,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
        ]);

        session()->flash('success', 'Produk berhasil ditambahkan.');

        return redirect()->route('products.index');
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
