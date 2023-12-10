<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PuskesmasRuangInap;

class PuskesmasRuangRawatInap extends Component
{
    public $ruangs;

    public function mount()
    {
        $this->ruangs = PuskesmasRuangInap::all();
    }

    public function render()
    {
        return view('livewire.detailpage.IbnuRawatInap');
    }
}
