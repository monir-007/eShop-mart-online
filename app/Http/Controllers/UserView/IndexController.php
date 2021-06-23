<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultipleImage;
use App\Models\Product;


class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name_eng', 'ASC')->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hotDeals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        return view('user-view.index', compact('categories', 'products', 'featured', 'hotDeals'));
    }

    public function productDetails($id, $slug)
    {
        $product = Product::findOrFail($id);
        $images = MultipleImage::where('product_id', $id)->orderBy('id', 'DESC')->get();
        return view('user-view.product.product-details', compact('product', 'images'));
    }
}
