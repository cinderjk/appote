<?php

namespace App\Livewire;

use Livewire\Component;

class Report extends Component
{
    public $title = 'Laporan';

    public function render()
    {
        return view('livewire.report')->layout('components.layouts.app', ['title' => $this->title]);
    }
}
