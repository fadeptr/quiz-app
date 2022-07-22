<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;

class LandingPage extends Component
{
    public $payments;
    public function mount()
    {
        $this->payments = Payment::orderBy('price','asc')->get();
    }
    public function render()
    {
        return view('livewire.landing-page')->extends('layouts.app');
    }
}
