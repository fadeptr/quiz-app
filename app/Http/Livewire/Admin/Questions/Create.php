<?php

namespace App\Http\Livewire\Admin\Questions;

use App\Models\Exam;
use App\Models\Question;
use Livewire\Component;

class Create extends Component
{
    public $exam;
    public $question, $options = [], $answer;

    public function mount($id)
    {
        $this->exam = Exam::find($id);
    }

    public function render()
    {
        return view('livewire.admin.questions.create')->extends('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]);

        Question::create([
            'exam_id' => $this->exam->id,
            'body' => $this->question,
            'options' => json_encode($this->options),
            'answer' => $this->answer
        ]);

        return redirect()->route('admin.questions.index',$this->exam->id);
    }
}
