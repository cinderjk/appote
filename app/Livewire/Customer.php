<?php

namespace App\Livewire;

use Livewire\Component;

class Customer extends Component
{
    public $title = 'Pelanggan';

    public function render()
    {
        return view('livewire.customer')->layout('components.layouts.app', ['title' => $this->title]);
    }
}
