<?php

namespace App\Http\Livewire;

use App\Services\FirebaseService;
use Livewire\Component;

class Chats extends Component
{
    public $list_user;
    public $content;


    public function render()
    {
        
        return view('livewire.chats')->extends('layouts.app')
        ->section('content');
    }
    /**
     * submit
     */
    
    public function submit()
    {   
        if (!empty($this->content)) {
            $database = FirebaseService::connect();
            $newPostKey = $database->getReference('users/')->push()->getKey();
    
            $postData = [
                'name'      => 'duy',
                'content'     => $this->content,
            ];
    
            $updates = [
                'users/' . $newPostKey => $postData,
            ];
    
            $database->getReference() // this is the root reference
                ->update($updates);
                
            $this->reset();
        }
    }
}