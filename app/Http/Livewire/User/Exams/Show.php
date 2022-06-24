<?php

namespace App\Http\Livewire\User\Exams;

use App\Models\Exam;
use Livewire\Component;
use App\Models\Question;

class Show extends Component
{
    public $exam, $total_questions;
    public function mount($id)
    {
        $this->exam = Exam::find($id);
        $this->total_questions = Question::where('exam_id',$id)->count();
    }
    public function render()
    {
        return view('livewire.user.exams.show')->extends('layouts.app');
    }

    public function start()
    {
        return redirect()->route('user.questions.index',$this->exam->id);
    }
}
