<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $title = 'Produk';

    public function render()
    {
        return view('livewire.product')->layout('components.layouts.app', ['title' => $this->title]);
    }
}
