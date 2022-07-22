<?php

namespace App\Http\Livewire\Admin\Exams\Users;

use App\Models\Exam;
use App\Models\ExamUser;
use Livewire\Component;

class Home extends Component
{
    public $exam;
    public function mount($id)
    {
        $this->exam = Exam::find($id);
    }

    public function render()
    {
        return view('livewire.admin.exams.users.home',[
            'exam_users' => ExamUser::where('exam_id',$this->exam->id)->latest()->paginate(10)
        ])->extends('layouts.app');
    }
}
