<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index($id) {
        $transactions = Transaction::where('user_id',$id)->where('amount','!=',NULL)->get()->toArray();  
        $data = array_reverse($transactions);
        return response($data);  
    }
    public function allTransactions()
    {
        $transactions = Transaction::all();
        // $data = array_reverse($transactions);
        // return $data;
        return view('admin.purchaser.showTransactions', compact('transactions'));
    }
}
