<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreateProduct extends Component
{
    use WithFileUploads;
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
        'description' => 'nullable',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric',
    ];

    public function create()
    {
        $this->price = fixCurrency($this->price);
        $this->sale_price = fixCurrency($this->sale_price);
        $this->slug = Str::slug($this->name);
        $this->validate();
        $image = Product::$defaultImage;
        if($this->image) {
            $image = $this->uploadImage();
        }

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

        $this->notify('success', 'Berhasil', 'Data berhasil dibuat!');     

        return to_route('product');
    }

    public function uploadImage()
    {
        $this->validate([
            'image' => 'nullable|image',
        ]);    

        Storage::put('public/products/' . $this->image->getClientOriginalName(), $this->image->get());

        return 'storage/products/' . $this->image->getClientOriginalName();
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
