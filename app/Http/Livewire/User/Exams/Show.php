<?php

namespace App\Http\Livewire\User\Exams;

use App\Models\Exam;
use Livewire\Component;
use App\Models\Question;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $exam, $total_questions, $membership;
    public function mount($id)
    {
        $this->exam = Exam::find($id);
        $this->total_questions = Question::where('exam_id',$id)->count();
        $this->membership = Membership::where('user_id',Auth::user()->id)->where('status','aktif')->first();
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
