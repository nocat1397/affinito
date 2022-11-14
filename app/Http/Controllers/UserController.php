<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(Request $request) 
    {
    
        $wallet = new Wallet;
        $wallet->amount = 0;
        $wallet->save();

        $purchaser = new User;
        $purchaser->name = $request->fname.' '.$request->lname;
        $purchaser->mobile = $request->mobile;
        $purchaser->email = $request->email;
        $purchaser->password = Hash::make($request->password);
        $purchaser->address = $request->address;
        $purchaser->city = $request->city;
        $purchaser->pincode = $request->pincode;
        $purchaser->role_id = 2;
        $purchaser->wallet_id = $wallet->id;
        $purchaser->save();
        
        return response('success');
    }

    public function details() {
        $user = Auth::user();
        return response($user);
    }
}
