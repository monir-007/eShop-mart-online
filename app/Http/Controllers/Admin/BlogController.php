<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogCategory()
    {
        $blogCategory = BlogPostCategory::latest()->get();
        return view('admin.blog.category.category-view', compact('blogCategory'));
    }

    public function blogCategoryStore(Request $request)
    {
        $request->validate([
            'name_eng' => 'required',
            'name_bng' => 'required',
        ]);

        BlogPostCategory::insert([
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-', $request->name_eng)),
            'slug_bng' => strtolower(str_replace(' ', '-', $request->name_bng)),
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Blog Category inserted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function blogCategoryEdit($id)
    {
        $blogCategory = BlogPostCategory::findOrFail($id);
        return view('admin.blog.category.category-edit', compact('blogCategory'));
    }

    public function blogCategoryUpdate(Request $request)
    {
        $blogCategoryId = $request->id;
        BlogPostCategory::findOrFail($blogCategoryId)->update([
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-', $request->name_eng)),
            'slug_bng' => strtolower(str_replace(' ', '-', $request->name_bng)),
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Blog Category updated successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('blog.category')->with($notification);
    }

    public function blogCategoryDelete($id)
    {
        BlogPostCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function blogPostView()
    {
        return view()
    }
}
