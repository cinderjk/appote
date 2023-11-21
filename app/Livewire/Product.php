<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Livewire\WithPagination;
class Product extends Component
{
    use WithPagination;
    public $title = 'Produk';

    public function render()
    {
        $products = ProductModel::latest()->with(['category', 'brand'])->paginate(10);
        return view('livewire.product'
        , [
            'products' => $products
        ]
        )->layout('components.layouts.app', ['title' => $this->title]);
    }
}
