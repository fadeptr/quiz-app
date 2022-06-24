<?php

namespace App\Http\Livewire\User\Exams;

use App\Models\Exam;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.user.exams.home',[
            'exams' => Exam::latest()->paginate(6)
        ])->extends('layouts.app');
    }
}
