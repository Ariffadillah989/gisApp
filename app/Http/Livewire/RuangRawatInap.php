<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RuangInap;

class RuangRawatInap extends Component
{
    public $ruangs;

    public function mount()
    {
        $this->ruangs = RuangInap::all();
    }

    public function render()
    {
        return view('livewire.detailpage.RuangRawatInap');
    }
}
