<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ErrConnect extends Component
{
    public function mount()
    {
        abort(404);
    }
    public function render()
    {
        return view('livewire.err-connect');
    }
}
