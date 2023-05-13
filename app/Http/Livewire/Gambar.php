<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Gambar extends Component
{
    public function render()
    {
        return view('livewire.gambar')->extends('layouts.app');
    }
}
