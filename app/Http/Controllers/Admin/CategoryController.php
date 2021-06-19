<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_eng' => 'required',
            'name_bng' => 'required',
            'category_icon' => 'required',
        ], [
            'name_eng.required' => 'Input Category English Name',
            'name_bng.required' => 'Input Category Bangla Name',
        ]);

        Category::insert([
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-', $request->name_eng)),
            'slug_bng' => str_replace(' ', '-', $request->name_bng),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Category added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-', $request->name_eng)),
            'slug_bng' => str_replace(' ', '-', $request->name_bng),
            'category_icon' => $request->category_icon,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }


    public function delete($id)
    {

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
