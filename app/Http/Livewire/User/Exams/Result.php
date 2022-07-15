<?php

namespace App\Http\Livewire\User\Exams;

use Livewire\Component;

class Result extends Component
{
    public $exam_user;
    public function mount()
    {
        $this->exam_user = ExamUser::where([
            'user_id' => Auth::user()->id,
            'exam_id' => $id
        ])->first();
    }

    public function render()
    {
        return view('livewire.user.exams.result')->extends('layouts.app');
    }
}
