<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Livewire\WithPagination;
class Product extends Component
{
    use WithPagination;
    public $title = 'Produk';

    public $q;
    protected $queryString = ['q'];

    public function updatedQ()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = ProductModel::latest()->with(['category', 'brand'])->where('name', 'like', '%'.$this->q.'%')->paginate(8);
        return view('livewire.product'
        , [
            'products' => $products
        ]
        )->layout('components.layouts.app', ['title' => $this->title]);
    }
}
