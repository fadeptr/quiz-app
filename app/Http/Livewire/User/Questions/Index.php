<?php

namespace App\Http\Livewire\User\Questions;

use App\Models\Question;
use Livewire\Component;

class Index extends Component
{
    public $questions_id, $nuquestion_idmber, $number;
    public $myAnswer = [];

    public function mount($id)
    {
        $question = Question::select(['id'])->where('exam_id',$id)->first();
        $this->number = 1;
        $this->question_id = $question->id;
        $this->questions_id = Question::select(['id'])->where('exam_id',$id)->get();
    }
    public function render()
    {
        return view('livewire.user.questions.index',[
            'question' => Question::find($this->question_id)
        ])->extends('layouts.app');
    }

    public function changeQuestion($id, $number)
    {
        $question = Question::select(['id'])->find($id);
        $this->question_id = $question->id;
        $this->number = $number;
    }

    public function selectAnswer($question_id, $key)
    {
        $this->myAnswer[$question_id] = $key;
    }

    public function checker()
    {
        dd($this->myAnswer);
    }

    public function prevNumber()
    {
        $question = Question::select(['id'])->find($this->question_id);
        $prev = Question::where('id','<',$question->id)->max('id');
        $this->question_id = $prev;
        $this->number--;
    }

    public function nextNumber()
    {
        $question = Question::select(['id'])->find($this->question_id);
        $next = Question::where('id','>',$question->id)->min('id');
        $this->question_id = $next;
        $this->number++;
    }
}
