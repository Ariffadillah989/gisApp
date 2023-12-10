<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IbnuSinaRuangInap;

class IbnuSinaRuangRawatInap extends Component
{
    public $ruangs;

    public function mount()
    {
        $this->ruangs = IbnuSinaRuangInap::all();
    }

    public function render()
    {
        return view('livewire.detailpage.IbnuRawatInap');
    }
}
