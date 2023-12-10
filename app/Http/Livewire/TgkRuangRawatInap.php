<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TgkRuangInap;

class TgkRuangRawatInap extends Component
{
    public $ruangs;

    public function mount()
    {
        $this->ruangs = TgkRuangInap::all();
    }

    public function render()
    {
        return view('livewire.detailpage.TgkRuangRawatInap');
    }
}
