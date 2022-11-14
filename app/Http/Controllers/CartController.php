<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartDetails($id) {

        
        $cart = Cart::where('user_id', $id)->with('product')->get();
        return response($cart);
    }
    public function store(Request $request) 
    {
        // $input = $request;

        // return $input;
        // exit;
        
        $carts = Cart::where('user_id', $request->user_id)->where('product_id',$request->product_id)->first();
        if(!empty($carts)){
            $cart = Cart::find($carts->id);
            $qty = ($cart->quantity + $request->qty);
            $cart->update(['quantity'=>$qty]);
            $cart->save();
            // exit;
            return response($cart);

        } else {
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->qty;
            $cart->user_id = $request->user_id;
            $cart->save();
            // exit;
            return response($cart);
        }
           
        

    }
    public function update(Request $request) {
        $cart = Cart::find($request->cart_id);
        $cart->update(['product_id'=>$request->product_id,'quantity'=>$request->quantity,'user_id'=>$request->user_id]);
        $cart->save();

        return response($cart);
    }
    public function destroy(Request $request) {
        $cart = Cart::find($request->cart_id);
        $cart->delete();
        return response($cart); 
    }
}
