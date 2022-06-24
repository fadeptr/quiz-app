<?php

namespace App\Http\Livewire\User\Exams;

use Livewire\Component;

class Result extends Component
{
    public function render()
    {
        return view('livewire.user.exams.result')->extends('layouts.app');
    }
}
