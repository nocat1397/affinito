<?php

namespace App\Http\Controllers;

// use App\Tag;
use App\Tag;
use App\Enquiry;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function addProduct() {

        // $tags = Tag::all();
        $categories = Category::all();
        return view('admin.product.addProduct',compact('categories'));
    
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
    public function addCategory() {

        return view('admin.category.addCategory');
    
    }
    public function addSubCategory() {
        $categories = Category::all();
        return view('admin.category.addSubCategory', compact('categories'));
    
    }
    public function addSubSubCategory() {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.category.addSubSubCategory', compact('categories','subcategories'));
    
    }
    public function ShowCategory() {
        // $categories = Category::all();
        // $subcategories = SubCategory::all();
        $category = Category::all();
        return view('admin.category.showCategory', compact('category'));
    
    }
    public function ShowSubCategory($id) {
        // return $id;
        // exit();
        $category = Category::find($id);
        $subcategory = $category->subcategories;
        // return $subcategory;
        // exit;
        // $city=City::find($id);
        // $area=$city->areas;
        // return view('admin.template.home.layout.displayarea',compact('area','city'));
        // $subcategory = SubCategory::all();
        return view('admin.category.showSubCategory', compact('subcategory','category'));
    
    }
    public function ShowSubSubCategory($id) {
        // return $id;
        // exit();
        $subcategory = SubCategory::find($id);
        $subsubcategory = $subcategory->subsubcategories;
        // return $subcategory;
        // exit;
        // $city=City::find($id);
        // $area=$city->areas;
        // return view('admin.template.home.layout.displayarea',compact('area','city'));
        // $subcategory = SubCategory::all();
        return view('admin.category.showSubSubCategory', compact('subcategory','subsubcategory'));
    
    }
public function allCategories()
    {
        $categories = Category::all();
        return response($categories);
    }
}
