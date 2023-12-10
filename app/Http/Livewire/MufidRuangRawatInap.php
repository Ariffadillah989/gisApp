<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MufidRuangInap;

class MufidRuangRawatInap extends Component
{
    public $ruangs;

    public function mount()
    {
        $this->ruangs = MufidRuangInap::all();
    }

    public function render()
    {
        return view('livewire.detailpage.IbnuRawatInap');
    }
}
