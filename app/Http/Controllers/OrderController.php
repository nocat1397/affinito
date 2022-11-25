<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Purchaser;
use App\Orderstatus;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function pending() {
        $orders = Order::where('orderstatus_id', 1)->get()->reverse();
        return view('admin.order.pendingorders', compact('orders'));
    }
    public function accepted() {
        $orders = Order::where('orderstatus_id', 2)->get()->reverse();
        return view('admin.order.completedOrders', compact('orders'));
    }
    public function dispatched() {
        $orders = Order::where('orderstatus_id', 3)->get()->reverse();        
        return view('admin.order.dispatchOrders', compact('orders'));
    }
    public function delivered() {
        $orders = Order::where('orderstatus_id', 4)->get()->reverse();
        return view('admin.order.deliveredOrders', compact('orders'));
    }
    public function cancelled() {
        $orders = Order::where('orderstatus_id', 5)->orWhere('orderstatus_id', 6)->orWhere('orderstatus_id', 7)->orWhere('orderstatus_id', 8)->get()->reverse();
        return view('admin.order.customerCancelled', compact('orders'));
    }
    public function declined() {
        $orders = Order::where('orderstatus_id', 9)->get()->reverse();
        return view('admin.order.declinedOrders', compact('orders'));
    }

    public function acceptOrder($id) 
    {
        $order = Order::find($id);
        $order->update(['orderstatus_id'=>2]);
        $order->save();
        // $details = [
        //     'title' => 'Order Confirmation',
        //     'body' => $order->user->name.' Your order is confirmed.'
        // ];
       
        // $mail = Mail::to($order->user->email)->send(new \App\Mail\Mailer($details));
        return redirect()->back();
    }
    public function declineOrder($id) 
    {
        $order = Order::find($id);
        $order->update(['orderstatus_id'=>9]);
        $order->save();
        // $details = [
        //     'title' => 'Order Cancelled',
        //     'body' => $order->user->name.' Your order has been cancelled.'
        // ];
       
        // $mail = Mail::to($order->user->email)->send(new \App\Mail\Mailer($details));
        return redirect()->back();
    }
    public function updateStatus($o_id,$s_id) 
    {
        // return $o_id;
        // exit;
        $status = Orderstatus::find($s_id);
        $order = Order::find($o_id);
        $order->update(['orderstatus_id'=>$s_id]);
        $order->save();
        // $details = [
        //     'title' => 'Order '.$status->name,
        //     'body' => $order->user->name.' Your order has been '.$status->name.'.'
        // ];
       
        // $mail = Mail::to($order->user->email)->send(new \App\Mail\Mailer($details));
        return redirect()->back();
    }
    public function orders($id) 
    {
        $orders = Purchaser::where('user_id', $id)->with('order')->with('product')->get();
        return response($orders);
    }
    public function orderDetails($id) 
    {    
        $order = Order::find($id);
        $statuses = Orderstatus::all();
        $purchasers = Purchaser::where('user_id',$order->user_id)->where('order_id',$order->id)->with('product')->get();
        
        return view('admin.order.orderDetails',compact('order','statuses','purchasers'));
    }
    public function orderCancel(Request $request)
    {
        $status = Orderstatus::find($request->s_id);
        $order = Order::find($request->o_id);
        $order->update(['orderstatus_id'=>$request->s_id]);
        $order->save();
        // $details = [
        //     'title' => 'Order '.$status->name,
        //     'body' => $order->user->name.' Your order has been '.$status->name.'.'
        // ];
       
        // $mail = Mail::to($order->user->email)->send(new \App\Mail\Mailer($details));
        return response($order);
    }
    public function cancelApprove($id)
    {
        $order = Order::find($id);
        $order->update(['orderstatus_id' => 6]);
        $order->save();
        return redirect()->back();
    }
    public function cancelDispprove($id)
    {
        $order = Order::find($id);
        $order->update(['orderstatus_id' => 4]);
        $order->save();
        return redirect()->back();
    }
}
