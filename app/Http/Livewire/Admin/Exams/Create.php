<?php

namespace App\Http\Livewire\Admin\Exams;

use App\Models\Exam;
use Livewire\Component;

class Create extends Component
{
    public $judul, $category, $year, $description, $timer;

    public function render()
    {
        return view('livewire.admin.exams.create')->extends('layouts.app');
    }

    public function tambahKeDatabase()
    {
        $this->validate([
            'judul' => 'required|min:3',
            'category' => 'required',
            'year' => 'required',
            'description' => 'required',
            'timer' => 'required',
        ]);

        Exam::create([
            'title' => $this->judul,
            'category' => $this->category,
            'year' => $this->year,
            'description' => $this->description,
            'timer' => $this->timer,
        ]);

        session()->flash('success', 'Berhasil Tambah Ujian');
        redirect()->route('admin.exams.home');
    }
}
