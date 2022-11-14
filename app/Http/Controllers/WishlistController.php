<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlistDetails($id) {

        
        $Wishlist = Wishlist::where('user_id', $id)->with('product')->get();
        return response($Wishlist);
    }
    public function store(Request $request) {

        $Wishlist = new Wishlist;
        $Wishlist->product_id = $request->product_id;
        $Wishlist->user_id = $request->user_id;
        $Wishlist->save();

        return response($Wishlist);
    }
    public function destroy(Request $request) {
        $Wishlist = Wishlist::find($request->wishlist_id);
        $Wishlist->delete();
        return response($Wishlist); 
    }
}
