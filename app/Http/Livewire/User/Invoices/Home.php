<?php

namespace App\Http\Livewire\User\Invoices;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.user.invoices.home',[
            'invoices' => Invoice::where('user_id',Auth::user()->id)->latest()->paginate(5)
        ])->extends('layouts.app');
    }
}
