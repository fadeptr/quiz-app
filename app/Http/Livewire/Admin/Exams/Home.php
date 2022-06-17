<?php

namespace App\Http\Livewire\Admin\Exams;

use App\Models\Exam;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.exams.home',[
            'examsList' => Exam::latest()->paginate(5)
        ])->extends('layouts.app');
    }

    public function hapusData($id)
    {
        Exam::where('id',$id)->delete();
        session()->flash('success', 'Berhasil Hapus Ujian');
        redirect()->route('admin.exams.home');
    }
}
