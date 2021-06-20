<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Illuminate\Http\Request;

class SubsubcategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name_eng', 'ASC')->get();
        $subsubcategory = SubSubcategory::latest()->get();
        return view('admin.category.sub-subcategory.index', compact('subsubcategory', 'categories'));
    }

    public function getSubcategory($categoryId)
    {
        $subcategories = SubCategory::where('category_id', $categoryId)->orderBy('name_eng', 'ASC')->get();
        return json_encode($subcategories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name_eng' => 'required',
            'name_bng' => 'required',
        ], [
            'category_id.required' => 'Please select a category',
            'subcategory_id.required' => 'Please select any subcategory',
            'name_eng.required' => 'Input SubSubCategory English Name',
            'name_bng.required' => 'Input SubSubCategory Bangla Name',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-',$request->name_eng)),
            'slug_bng' => strtolower(str_replace(' ', '-',$request->name_bng)),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
