<?php

namespace App\Livewire;

use Livewire\Component;

class Transaction extends Component
{
    public $title = 'Transaksi';
    
    public function render()
    {
        return view('livewire.transaction')->layout('components.layouts.app', ['title' => $this->title]);
    }
}
