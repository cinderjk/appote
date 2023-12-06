<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
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

    public function deleteById($id) 
    {
        $product = ProductModel::find($id);
        if($product){
            if($product->image != ProductModel::$defaultImage) {
                Storage::delete('public/products/' . $product->image);
                dd('ok');
            }
            $product->delete();
            $this->notify('success', 'Berhasil', 'Data berhasil dihapus!'); 
        } else {
            $this->notify('error', 'Gagal', 'Data gagal dihapus!'); 
        }
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
