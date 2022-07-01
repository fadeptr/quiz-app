<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Midtrans\Config;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Membership;
use Midtrans\Notification;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Config::$isProduction = false;
        Config::$serverKey = config('midtrans.serverKey');

        try {
            $notif = new Notification();
        }
        catch (\Exception $e) {
            exit($e->getMessage());
        }

        $notif = $notif->getResponse();
        $transaction = $notif->transaction_status;
        $order_id = $notif->order_id;
        $user_id = explode('-',$order_id)[1];
        $payment_id = explode('-',$order_id)[2];

        $payment = Payment::find($payment_id);

        Invoice::updateOrInsert(
            ['order_id' => $order_id,'user_id' => $user_id, 'product_name' => $payment->title, 'total_payment' => $payment->price],
            ['status' => $transaction]
        );

        if($transaction == 'settlement'){
            Membership::updateOrInsert(
                ['user_id' => $user_id],
                ['expired' => Carbon::now()->addMonths($payment->benefit), 'status' => 'aktif']
            );
        }

    }
}
