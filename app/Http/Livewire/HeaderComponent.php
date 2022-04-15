<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HeaderComponent extends Component
{
    public function getListeners()
    {
        return [
            'refresh'=>'$refresh',
        ];
    }
    public function render()
    {
        return view('livewire.header-component');
    }
}
