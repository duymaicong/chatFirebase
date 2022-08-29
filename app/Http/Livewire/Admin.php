<?php

namespace App\Http\Livewire;

use App\Services\FirebaseService;
use Livewire\Component;

class Admin extends Component
{
    public $listConnect, $listDisconnect;
    public $list_quest;

    public $index = 0;

    /**
     * update index
     */

    public function updateIndex($x)
    {
        $this->index    = $x;
        $database       = FirebaseService::connect();
        $newPostKey     = $database->getReference('index/')->push()->getKey();
        $updates = [
            'index/' => $x,
        ];

        $database->getReference() // this is the root reference
            ->update($updates);
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Cập nhật thành công']);
    }

    /**
     * next quest
     */

    public function next()
    {
        try {
            $check = count($this->list_quest);
            $this->index++;
            if ($this->index >= $check) {
                $this->index = 0;
            }
            $database       = FirebaseService::connect();
            $newPostKey     = $database->getReference('index/')->push()->getKey();
            $updates = [
                'index/' => $this->index,
            ];

            $database->getReference() // this is the root reference
                ->update($updates);
        } catch (\Throwable $th) {
        }
    }

    /**
     * prev quest
     */

    public function prev()
    {
        try {
            $check = count($this->list_quest);
            $this->index--;
            if ($this->index < 0) {
                $this->index = $check-1;
            }
            $database       = FirebaseService::connect();
            $newPostKey     = $database->getReference('index/')->push()->getKey();
            $updates = [
                'index/' => $this->index,
            ];

            $database->getReference() // this is the root reference
                ->update($updates);
        } catch (\Throwable $th) {
        }
    }


    public function render()
    {
        return view('livewire.admin')->extends('layouts.app')
            ->section('content');
    }
}
