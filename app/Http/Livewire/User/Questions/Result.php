<?php

namespace App\Http\Livewire\User\Questions;

use Livewire\Component;
use App\Models\ExamUser;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class Result extends Component
{
    public $exam_user, $number, $question_id, $questions_id;
    public $myAnswer = [];
    public function mount($id)
    {
        $this->exam_user = ExamUser::where([
            'user_id' => Auth::user()->id,
            'exam_id' => $id
        ])->first();
        if(!$this->exam_user){
            return redirect()->route('user.exams.show',$id);
        }
        if(!$this->exam_user->answers){
            return redirect()->route('user.questions.index',$id);
        }
        $question = Question::select(['id'])->where('exam_id',$id)->first();
        $this->number = 1;
        $this->question_id = $question->id;
        $this->questions_id = Question::select(['id','answer'])->where('exam_id',$id)->get();

        $this->myAnswer = json_decode($this->exam_user->answers,true);

    }

    public function render()
    {
        return view('livewire.user.questions.result',[
            'question' => Question::find($this->question_id)
        ])->extends('layouts.app');
    }

    public function changeQuestion($id, $number)
    {
        $question = Question::select(['id'])->find($id);
        $this->question_id = $question->id;
        $this->number = $number;
    }
}
