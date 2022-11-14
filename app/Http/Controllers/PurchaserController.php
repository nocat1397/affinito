<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Order;
use App\Wallet;
use App\Product;
use App\Purchaser;
use App\Transaction;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $amount = $user->wallet->amount;
        // return $request->mode;
        // exit;
        
        if($request->amount < $amount || $request->mode == 'cash') 
        {

        $order = new Order;
        $order->user_id = $request->user_id;
        $order->amount = $request->amount;
        $order->orderstatus_id = 1;
        $order->save();
        
        $transaction = new Transaction;
        $transaction->user_id = $request->user_id;
        $transaction->order_id = $order->id;
        $transaction->amount = $request->amount;
        $transaction->payment_mode = $request->mode;
        $transaction->save();
        
        if($request->mode !== 'cash')
        {

            $user = User::find($request->user_id);
            $amount = $user->wallet->amount - $request->amount;
            $user->wallet->update(['amount'=>$amount]);
            $user->save();
        }
        
        foreach($request->carts as $cart) 
        {
            
            $purchaser = new Purchaser;
            $purchaser->product_id = $cart['product_id'];
            $purchaser->quantity = $cart['quantity'];
            $purchaser->order_id = $order->id;
            $purchaser->user_id = $cart['user_id'];
            $purchaser->save();
            
            $product = Product::find($cart['product_id']);
            $product->update(['quantity' => $product->quantity - $cart['quantity']]);
            $product->save();
            
            
            $deleteCart = Cart::find($cart['id']);
            $deleteCart->delete();
            
        }
        
        return response($transaction);
    } 
    return response('error');



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function makeOrder(Request $request)
    {
        // return response($request);
        // exit;
        $order = new Order;
        $order->user_id = $request->user_id;
        $order->amount = $request->amount;
        $order->save();

        $api = new Api('rzp_live_jsM1RA5E4QnfP6', 'g1Hh46JHyebUS9UWqLt00qp6');
        $rzpOrder = $api->order->create(array(
            'receipt' => 'rcpt_user'.$request->user_id.'_order'.$order->id,
            'amount' => $order->amount*100,
            'currency' => 'INR'
            )
        );
        $order_id = $rzpOrder['id'];

        $updateOrder = Order::find($order->id);
        $updateOrder->update(['rzp_order_id'=>$order_id,'orderstatus_id'=>1]);
        $updateOrder->save();

        return response($updateOrder);
    }
}
