<?php

namespace App\Http\Livewire\User\Questions;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ExamUser;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $questions, $myNumber = 0;
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

        $this->questions = Question::where('exam_id',$id)->inRandomOrder()->get()->toArray();
    }
    public function render()
    {
        return view('livewire.user.questions.index')->extends('layouts.app');
    }

    public function changeQuestion($number)
    {
        $this->myNumber = $number;
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
        $this->myNumber--;
    }

    public function nextNumber()
    {
        $this->myNumber++;
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
