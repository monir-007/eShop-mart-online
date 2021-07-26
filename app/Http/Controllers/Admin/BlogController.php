<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

    public function blogPostInsert()
    {
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::latest()->get();
        return view('admin.blog.post.post-insert', compact('blogPost', 'blogCategory'));
    }

    public function blogPostList()
    {
        $blogPost = BlogPost::with('category')->latest()->get();
        return view('admin.blog.post.post-list', compact('blogPost'));
    }

    public function blogPostStore(Request $request)
    {
        $request->validate([
            'title_eng' => 'required',
            'title_bng' => 'required',
            'post_image' => 'required',
        ], [
            'title_eng.required' => 'Input Post Title English Name',
            'title_bng.required' => 'Input Post Title Bangla Name',
        ]);

        $image = $request->file('post_image');
        $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('images/upload/blog-post/' . $nameGenarate);
        $saveUrl = 'images/upload/blog-post/' . $nameGenarate;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'title_eng' => $request->title_eng,
            'title_bng' => $request->title_bng,
            'slug_eng' => strtolower(str_replace(' ', '-', $request->title_eng)),
            'slug_bng' => strtolower(str_replace(' ', '-', $request->title_bng)),
            'post_image' => $saveUrl,
            'details_eng' => $request->details_eng,
            'details_bng' => $request->details_bng,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog post added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.post.list')->with($notification);
    }

    public function blogPostEdit($id)
    {
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::findOrFail($id);
        return view('admin.blog.post.post-edit', compact('blogPost', 'blogCategory'));
    }

    public function blogPostUpdate(Request $request, $id)
    {
        BlogPost::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'title_eng' => $request->title_eng,
            'title_bng' => $request->title_bng,
            'slug_eng' => strtolower(str_replace(' ', '-', $request->title_eng)),
            'slug_bng' => str_replace(' ', '-', $request->title_bng),
            'details_eng' => $request->details_eng,
            'details_bng' => $request->details_bng,
            'updated_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Post updated without image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.post.list')->with($notification);
    }

    public function blogPostCoverUpdate(Request $request)
    {
        $blogPostId = $request->id;
        $oldImage = $request->oldImage;
        unlink($oldImage);

        $image = $request->file('post_image');
        $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('images/upload/blog-post/' . $nameGenarate);
        $saveUrl = 'images/upload/blog-post/' . $nameGenarate;

        BlogPost::findOrFail($blogPostId)->update([
            'post_image' => $saveUrl,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Post Cover Image updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function blogPostDelete($id)
    {
        $post = BlogPost::findOrFail($id);
        $image = $post->post_image;
        unlink($image);

        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Post Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
