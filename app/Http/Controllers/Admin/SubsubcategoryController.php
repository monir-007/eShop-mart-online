<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
            'created_at'=>Carbon::now()
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit($id){
        $categories = Category::orderBy('name_eng','ASC')->get();
        $subcategories = SubCategory::orderBy('name_eng','ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('admin.category.sub-subcategory.edit',compact('categories','subcategories','subsubcategories'));
    }

    public function update(Request $request){
        $subsubcategoryId = $request->id;
        SubSubCategory::findOrFail($subsubcategoryId)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-',$request->name_eng)),
            'slug_bng' => strtolower(str_replace(' ', '-',$request->name_bng)),
        ]);
        $notification = array(
            'message' => 'Sub-SubCategory update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('sub-subcategory.index')->with($notification);
    }

    public function delete($id)
    {
        SubSubcategory::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

}
