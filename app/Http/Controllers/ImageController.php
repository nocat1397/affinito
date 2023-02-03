<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use App\HomeBanner;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = HomeBanner::all();
        return response($banners);
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
        if ($files = $request->file('banners')) {
            foreach ($files as $file) {
                $name=$file->getClientOriginalName();
                $file->move('images/banners/', $name);
                $banner = new HomeBanner;
                $banner->home = $name;
                $banner->save();
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $banners = HomeBanner::all();
        return view('admin.banner.addBanner', compact('banners'));
    }
    public function bannerDelete($id)
    {
        $banner = HomeBanner::find($id);
        $path = public_path().'/images/banners/'.$banner->home;
        $delete = unlink($path);
        $banner->delete();
        return redirect()->back();
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
    public function destroy($product_id, $image_id)
    {
        // exit;
        $product = Product::find($product_id);
        $image = Image::find($image_id);
        $product->images()->detach($image);
        $image->delete();
        return redirect()->back();
    }
    public function cart() {
        $images = Product::with('images')->get();
        return response($images);
    }
}
