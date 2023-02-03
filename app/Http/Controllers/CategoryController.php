<?php

namespace App\Http\Controllers;

use App\Image;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::with('products','subcategories','subsubcategories')->get();
        // $subCategory = SubCategory::with('subsubcategories')->get();
        // $product = App\Product::with('country')->get();
        
        return response($category);
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
    //    return $request;
    //    exit;
        


        $category = new Category;
        $category->name = $request->name;
        if ($request->hasfile('files')) {
            $file = $request->file('files');
            $name = $file->getClientOriginalName();
            $filename = $name;
            $file->move('category', $filename);
            $category->file = $filename;
        }
    
        // return$category;
        // exit;
        $category->save();
       
       
        return redirect()->back();
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
    public function edit(Request $request)
    {
        
        $category = Category::find($request->category_id);
        $category->update(['name'=>$request->name]);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $filename = $name;
            $file->move('category', $filename);
            $category->file = $filename;
        }
        // return $category;
        // exit;
        $category->save();  
        
        return redirect()->back();
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
        $category = Category::find($id);
        // return $category->products;

        if(sizeof($category->products)){
            return redirect()->back()->with('message','First you have to delete products related to this category.');
        } else {
            $category->delete();
            return redirect()->back()->with('success','Category deleted successfully.');
        }
    }
    public function front()
    {
        $categories = Category::with('products')->get();
        return response($categories);
    }
}
