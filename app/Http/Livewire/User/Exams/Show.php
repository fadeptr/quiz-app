<?php

namespace App\Http\Livewire\User\Exams;

use Carbon\Carbon;
use App\Models\Exam;
use Livewire\Component;
use App\Models\ExamUser;
use App\Models\Question;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $exam, $total_questions, $membership, $exam_user;
    public function mount($id)
    {
        $this->exam_user = ExamUser::where([
            'user_id' => Auth::user()->id,
            'exam_id' => $id
        ])->first();
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
        ExamUser::create([
            'user_id' => Auth::user()->id,
            'exam_id' => $this->exam->id,
            'expired' => Carbon::now()->addMinutes($this->exam->timer)
        ]);
        return redirect()->route('user.questions.index',$this->exam->id);
    }
}
