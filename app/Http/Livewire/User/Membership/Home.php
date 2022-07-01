<?php

namespace App\Http\Livewire\User\Membership;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $payments;
    public function mount()
    {
        $this->payments = Payment::get();
    }

    public function render()
    {
        return view('livewire.user.membership.home')->extends('layouts.app');
    }

    public function pay($payment_id)
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Get Payment
        $payment = Payment::find($payment_id);
        $order_id = [
            rand(),
            Auth::user()->id,
            $payment->id
        ];
        $order_id = implode('-',$order_id);

        $transaction_details = array(
            'order_id' => $order_id,
            'gross_amount' => $payment->price, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => $payment->id,
            'price' => $payment->price,
            'quantity' => 1,
            'name' => $payment->title
        );

        // Optional
        $item_details = array ($item1_details);

        // Optional
        $customer_details = array(
            'first_name'    => Auth::user()->name,
            'email'         => Auth::user()->email,
        );

        // Optional, remove this to display all available payment methods
        $enable_payments = array('gopay','shopeepay','bca_va','echannel','bri_va','bni_va');

        // Fill transaction details
        $transaction = array(
            'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );
        $snap_token = '';
        try {
            $snap_token = Snap::getSnapToken($transaction);
            $this->emit('getSnap',$snap_token);
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
