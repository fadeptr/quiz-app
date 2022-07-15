<?php

namespace App\Http\Livewire\User\Questions;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ExamUser;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $questions_id, $number;
    public $exam_user;
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
        if($this->exam_user->answers){
            return redirect()->route('user.questions.result',$id);
        }

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
        if(Carbon::now() > $this->exam_user->expired){
            $point = 0;
            // Cek Benar
            $questions = Question::where('exam_id',$this->exam_user->exam_id)->orderBy('id','asc')->get();
            foreach($questions as $item){
                if(isset($this->myAnswer[$item->id])){
                    if($this->myAnswer[$item->id] == $item->answer){
                        $point++;
                    }
                }
            }
            // dd($this->myAnswer);
            ExamUser::where([
                'user_id' => Auth::user()->id,
                'exam_id' => $this->exam_user->exam_id
            ])->update([
                'answers' => json_encode($this->myAnswer),
                'point' => $point
            ]);
            return redirect()->route('user.questions.result',$this->exam_user->exam_id);
        }
    }

    public function selectAnswer($question_id, $key)
    {
        $this->myAnswer[$question_id] = $key;
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

    public function finish()
    {
        $point = 0;
        // Cek Benar
        $questions = Question::where('exam_id',$this->exam_user->exam_id)->orderBy('id','asc')->get();
        foreach($questions as $item){
            if($this->myAnswer[$item->id] == $item->answer){
                $point++;
            }
        }
        ExamUser::where([
            'user_id' => Auth::user()->id,
            'exam_id' => $this->exam_user->exam_id
        ])->update([
            'answers' => json_encode($this->myAnswer),
            'point' => $point
        ]);
        return redirect()->route('user.questions.result',$this->exam_user->exam_id);

        // Ambil Nilai
        // Input Database
    }
}
