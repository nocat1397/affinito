<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $tags = Tag::all();
        return view('admin.product.showProducts',compact('products','tags'));
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
        $this->validate($request, [
            'file' => 'required',
            'file.*' => 'image|max:70|dimensions:width=300,height=300'
        ],
        [
            'file.*.max' => 'Your photo is too large, must be less than :max kb.',
            'file.*.dimensions' => 'Please Upload image with 300 x 300 resolution.'
        ]);

        $product = new Product;
        $product->name = str_replace(' ', '-', $request->name);
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->quantity_unit = $request->quantity_unit;
        $product->amount = $request->amount;
        $product->amount_unit = $request->amount_unit;
        $product->tag_id = $request->tag;
        $product->save();

     
        if ($files=$request->file('file')) {
            foreach ($files as $file)
            {
                $name=$product->id.''.$file->getClientOriginalName();
                $file->move('images',$name);    
                $image = new Image;
                $image->file = $name;
                // $image->product_id = $product->id;
                $image->save();
                $product->images()->attach($image);
            }
        }
        return redirect()->back()->with('message','Product Added Successfully');
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
    public function update(Request $request)
    {
        //
    }
    public function productChange(Request $request)
    {
        // $this->validate($request, [
        //     'file' => 'required',
        //     'file.*' => 'image|max:70|dimensions:width=300,height=300'
        // ],
        // [
        //     'file.*.max' => 'Your photo is too large, must be less than :max kb.',
        //     'file.*.dimensions' => 'Please Upload image with 300 x 300 resolution.'
        // ]    

        // );

        $product = Product::find($request->product_id);
        $product->update(['name'=>$request->name, 'description'=>$request->description, 'quantity'=>$request->quantity, 'quantity_unit'=>$request->quantity_unit, 'amount'=>$request->amount, 'amount_unit'=>$request->amount_unit, 'tag_id'=>$request->tag_id]);
        $product->save();
        if ($files=$request->file('file')) {
            foreach ($files as $file)
            {
                $name=$product->id.''.$file->getClientOriginalName();
                $file->move('images',$name);    
                $image = new Image;
                $image->file = $name;
                // $image->product_id = $product->id;
                $image->save();
                $product->images()->attach($image);
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        
        $product->delete();
        return redirect()->back();
    }
    public function front()
    {
        $products = Product::with('images')->get();
        return response($products);
    }
    public function fetchProducts($name) {
        $product = Product::where('name', $name)->with('images')->get();

        return response($product);
    }
    public function searchProduct($name){
        $products = Product::where('name','LIKE', $name.'%')->get();
        return response($products);
    }
}
