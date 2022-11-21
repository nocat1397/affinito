<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role->name == "Admin"){
            $pendingOrders = Order::where('orderstatus_id', 1)->get()->count();
            $totalOrders = Order::where('orderstatus_id', '!=', null)->get()->count();
            $completeOrders = Order::where('orderstatus_id', 2)->get()->count();
            $dispatchOrders = Order::where('orderstatus_id', 3)->get()->count();
            $deliveredOrders = Order::where('orderstatus_id', 4)->get()->count(); 
            $cancleOrders = Order::where('orderstatus_id', 5)->orWhere('orderstatus_id', 6)->orWhere('orderstatus_id', 7)->orWhere('orderstatus_id', 8)->get()->count();
            // return $orders;
            return view('home', compact('pendingOrders','completeOrders','dispatchOrders','deliveredOrders','cancleOrders','totalOrders'));
        } else {
            return redirect()->back();
        }
    }

    public function totals(){
        return view('home', compact('orders'));
    }
}
