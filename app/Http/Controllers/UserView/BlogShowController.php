<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Illuminate\Http\Request;

class BlogShowController extends Controller
{
    public function blogIndex()
    {
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::latest()->get();
        return view('user-view.blog.index', compact('blogCategory', 'blogPost'));
    }

    public function blogDetails($id)
    {
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::findOrFail($id);
        return view('user-view.blog.blog-details', compact('blogPost', 'blogCategory'));
    }

    public function blogCategoryPost($id)
    {
        $blogCategory = BlogPostCategory::latest()->get();
        $blogPost = BlogPost::where('category_id', $id)->orderBy('id', 'DESC')->get();
        return view('user-view.blog.blog-category-list', compact('blogPost', 'blogCategory'));
    }
}
