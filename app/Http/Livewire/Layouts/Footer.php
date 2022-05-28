<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Footer extends Component
{
    public string $message = 'message';
    public function render()
    {
        return view('livewire.layouts.footer');
    }
}
