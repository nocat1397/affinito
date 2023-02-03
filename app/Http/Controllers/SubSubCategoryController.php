<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
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
        
        $subsubcategory = new SubSubCategory;
        $subsubcategory->category_id = $request->category_id;
        $subsubcategory->sub_category_id = $request->subcategory_id;
       
        $subsubcategory->name = $request->name;
        if ($request->hasfile('files')) {
            $file = $request->file('files');
            $name = $file->getClientOriginalName();
            $filename = $name;
            $file->move('subsubcategory', $filename);
            $subsubcategory->file = $filename;
        }
        // return $request;
        // exit();
        $subsubcategory->save();
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $subsubcategory = SubSubCategory::find($request->sub_sub_category_id);
        $subsubcategory->update(['name'=>$request->name]);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $filename = $name;
            $file->move('subsubcategory', $filename);
            $subsubcategory->file = $filename;
        }
        $subsubcategory->save();  
        
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
        $subsubcategory = SubSubCategory::find($id);
        
        $subsubcategory->delete();
        return redirect()->back();
    }
    public function getSubCategory(Request $request)
    {
        $subcatgory = SubCategory::where('category_id',$request->id)->get();
        $subsubcategory = SubSubCategory::where('category_id',$request->id)->get();
        return response(array($subcatgory,$subsubcategory));
        
    }

    public function getSubSubCategory(Request $request)
    {
        // return response($subsubcatgory);
        
    }

}
