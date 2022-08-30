<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListQuest extends Component
{

    public $list_quest,$list_key;
    public $index=0,$content;

    public function submit(){ 
        dd('ok');
    }
    
    public function render()
    {
        return view('livewire.list-quest')->extends('layouts.app')
        ->section('content');
    }
}
