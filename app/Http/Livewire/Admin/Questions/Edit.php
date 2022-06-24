<?php

namespace App\Http\Livewire\Admin\Questions;

use App\Models\Exam;
use Livewire\Component;
use App\Models\Question;

class Edit extends Component
{
    public $exam, $question_id;
    public $question, $options = [], $answer;

    public function mount($id, $question_id)
    {
        $this->exam = Exam::find($id);
        $this->question_id = $question_id;
        $question = Question::find($question_id);
        $this->question = $question->body;
        $this->options = json_decode($question->options,true);
        $this->answer = $question->answer;
    }

    public function render()
    {
        return view('livewire.admin.questions.edit')->extends('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]);

        Question::where('id',$this->question_id)->update([
            'body' => $this->question,
            'options' => json_encode($this->options),
            'answer' => $this->answer
        ]);

        return redirect()->route('admin.questions.index',$this->exam->id);
    }
}
