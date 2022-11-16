<?php

namespace App\Http\Controllers;

// use App\Tag;
use App\Enquiry;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function addProduct() {

        // $tags = Tag::all();
        return view('admin.product.addProduct');
    
    }
    public function addEnquiry(Request $request) {
        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->mobile = $request->mobile;
        $enquiry->email = $request->email;
        $enquiry->message = $request->message;
        $enquiry->save();
        
        return response($enquiry);
    }
    public function enquiry() {

        $enquiries = Enquiry::all();
        return view('admin.enquiry.showEnquiries', compact('enquiries'));
    }
    // public function allTags()
    // {
    //     $tags = Tag::all();
    //     return response($tags);
    // }
}
