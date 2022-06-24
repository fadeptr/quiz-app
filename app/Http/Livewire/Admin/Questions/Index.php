<?php

namespace App\Http\Livewire\Admin\Questions;

use App\Models\Exam;
use App\Models\Question;
use Livewire\Component;

class Index extends Component
{
    public $exam;

    public function mount($id)
    {
        $this->exam = Exam::find($id);
    }
    public function render()
    {
        return view('livewire.admin.questions.index',[
            'questions' => Question::where('exam_id',$this->exam->id)->get()
        ])->extends('layouts.app');
    }
    public function deleteQuestion($id){
        $question = Question::find($id);
        $question->delete();
    }
}
