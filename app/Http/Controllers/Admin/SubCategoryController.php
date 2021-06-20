<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name_eng','ASC')->get();
        $subCategories = SubCategory::latest()->get();
        return view('admin.category.subcategory.index', compact('subCategories','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name_eng' => 'required',
            'name_bng' => 'required',
        ],[
            'category_id.required' => 'Please select Any option',
            'name_eng.required' => 'Input SubCategory English Name',
            'name_bng.required' => 'Input SubCategory Bangla Name',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-',$request->name_eng)),
            'slug_bng' => strtolower(str_replace(' ', '-',$request->name_bng)),
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function edit($id){
        $categories = Category::orderBy('name_eng','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.category.subcategory.edit',compact('subcategory','categories'));
    }

    public function update(Request $request)
    {
        $subcategoryId = $request->id;

        SubCategory::findOrFail($subcategoryId)->update([
            'category_id' => $request->category_id,
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-',$request->name_eng)),
            'slug_bng' => strtolower(str_replace(' ', '-',$request->name_bng)),
        ]);
        $notification = array(
            'message' => 'Subcategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('subcategory.index')->with($notification);
    }

    public function delete($id){

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Subcategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }
}
