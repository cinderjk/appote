<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EditProduct extends Component
{
    use WithFileUploads;
    public $title = 'Edit Produk';
    public $brand_id = 1;
    public $category_id = 1;
    public $name;
    public $slug;
    public $description;
    public $image;
    public $price;
    public $sale_price;

    public $ids;
    public $has_sale = false;
    public $oldImage;
    public $fullPathImage;

    protected $rules = [
        'brand_id' => 'required|exists:brands,id',
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|min:3|max:255',
        'description' => 'nullable',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric',
    ];

    public function mount($id)
    {
        $product = Product::findOrFail($id);
        $this->brand_id = $product->brand_id;
        $this->category_id = $product->category_id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->image = $product->image;
        $this->price = (int) $product->price;
        $this->sale_price = (int) $product->sale_price;  
        $this->ids = $product->id;
        $this->has_sale = ($product->sale_price) ? true : false;  
        $this->oldImage = $product->image;
        $this->fullPathImage = asset($product->image);
    }

    public function save()
    {
        $this->price = fixCurrency($this->price);
        $this->sale_price = fixCurrency($this->sale_price ?? '');
        $this->validate();
        $this->slug = Str::slug($this->name);
        $this->validate([
            'slug' => 'required|min:3|max:255|unique:products,slug,' . $this->ids,
        ]);
        $image = Product::$defaultImage;
        if($this->image) {
            $image = $this->uploadImage();
        }

        Product::where('id', $this->ids)->update([
            'brand_id' => $this->brand_id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $image,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
        ]);

        session()->flash('success', 'Produk berhasil ditambahkan');

        return to_route('product');
    }

    public function uploadImage()
    {
        // check if image is string or object
        if(!is_string($this->image)) {
            $this->validate([
                'image' => 'nullable|image',
            ]);
            // delete old image if not default image
            if($this->oldImage != Product::$defaultImage) Storage::delete('public/products/' . $this->oldImage);
    
            Storage::put('public/products/' . $this->image->getClientOriginalName(), $this->image->get());
    
            return 'storage/products/' . $this->image->getClientOriginalName();
        } else {
            return $this->image;
        }
    }

    public function render()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('livewire.edit-product',
            compact('brands', 'categories')
        )->layout('components.layouts.app', [
            'title' => $this->title
        ]);
    }
}
