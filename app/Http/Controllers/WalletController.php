<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use Razorpay\Api\Api;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index($id) {
        
        $user = User::where('id',$id)->with('wallet')->first();
        return response($user);
    }

    public function store(Request $request)
    {
        // return response($request);
        // exit;
        $wallet = new Transaction;
        $wallet->user_id = $request->user_id;
        $wallet->amount = $request->amount;
        $wallet->save();

        $api = new Api('rzp_live_jsM1RA5E4QnfP6', 'g1Hh46JHyebUS9UWqLt00qp6');
        // $api = new Api('rzp_test_s7RstDro0RRmJj', 'yiGVZ0jOPMe0nz3jMMyeh9Ue');
        $rzpOrder = $api->order->create(array(
            'receipt' => 'rcpt_user'.$request->user_id.'_order'.$wallet->id,
            'amount' => $wallet->amount*100,
            'currency' => 'INR'
            )
        );
        $order_id = $rzpOrder['id'];

        $updateOrder = Transaction::find($wallet->id);
        $updateOrder->update(['rzp_order_id'=>$order_id]);
        $updateOrder->save();

        return response($updateOrder);
    }

    public function payment(Request $request)
    {

        $input = $request;
        $api = new Api('rzp_live_jsM1RA5E4QnfP6', 'g1Hh46JHyebUS9UWqLt00qp6');
        // $api = new Api('rzp_test_s7RstDro0RRmJj', 'yiGVZ0jOPMe0nz3jMMyeh9Ue');
        $payment = $api->payment->fetch($input->payResponse['razorpay_payment_id']);
        
        $order = Transaction::find($request->id);
        $order->update(['rzp_payment_id'=>$request->payResponse['razorpay_payment_id'], 'payment_mode'=>$payment['method']]);
        $order->save();
        
        $user = User::find($request->user_id);
        $total = ($user->wallet->amount + $request->amount);
        $user->wallet->update(['amount'=>$total]);
        $user->save();
        
        // $payment->capture(array('amount' => $request->amount, 'currency' => 'INR'));
        return response($user);
    }
}
