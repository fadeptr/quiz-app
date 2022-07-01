<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Membership as MembershipModal;

class Membership extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $member = MembershipModal::where('user_id',Auth::user()->id)->where('status','aktif')->count();
        return view('components.membership',[
            'member' => $member
        ]);
    }
}
