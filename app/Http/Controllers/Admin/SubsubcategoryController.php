<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubSubcategory;
use Illuminate\Http\Request;

class SubsubcategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name_eng','ASC')->get();
        $subsubcategory = SubSubcategory::latest()->get();
        return view('admin.category.sub-subcategory.index', compact('subsubcategory','categories'));
    }
}
