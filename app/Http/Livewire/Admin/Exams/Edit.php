<?php

namespace App\Http\Livewire\Admin\Exams;

use App\Models\Exam;
use Livewire\Component;

class Edit extends Component
{
    public $exam_id;
    public $judul, $category, $year, $description, $timer;

    public function mount($id)
    {
        $exam = Exam::find($id);
        $this->exam_id = $id;
        // propertie inputan
        $this->judul = $exam->title;
        $this->category = $exam->category;
        $this->year = $exam->year;
        $this->description = $exam->description;
        $this->timer = $exam->timer;

    }

    public function render()
    {
        return view('livewire.admin.exams.edit')->extends('layouts.app');
    }

    public function changeUjian()
    {
        $this->validate([
            'judul' => 'required|min:3',
            'category' => 'required',
            'year' => 'required',
            'description' => 'required',
            'timer' => 'required',
        ]);

        Exam::where('id', $this->exam_id)->update([
            'title' => $this->judul,
            'category' => $this->category,
            'year' => $this->year,
            'description' => $this->description,
            'timer' => $this->timer,
        ]);

        session()->flash('success', 'Berhasil diubah Ujian');
        redirect()->route('admin.exams.home');
    }
}
