<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RsLocation extends Component
{
    public $long, $lat;
    public $test = "value test";

    public function render()
    {
        return view('livewire.rs-location');
    }
}
