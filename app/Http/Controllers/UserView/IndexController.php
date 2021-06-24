<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
        $specialOffers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $specialDeals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();

        $categoryData_0 = Category::skip(0)->first();
        $productData_0 = Product::where('status', 1)->where('category_id', $categoryData_0->id)->orderBy('id', 'DESC')->get();

        $categoryData_1 = Category::skip(1)->first();
        $productData_1 = Product::where('status', 1)->where('category_id', $categoryData_1->id)->orderBy('id', 'DESC')->get();

        $brandData_10 = Brand::skip(10)->first();
        $productData_10 = Product::where('status', 1)->where('brand_id', $brandData_10->id)->orderBy('id', 'DESC')->get();

        return view('user-view.index', compact(
            'categories',
            'products',
            'featured',
            'specialOffers',
            'specialDeals',
            'categoryData_0',
            'productData_0',
            'categoryData_1',
            'productData_1',
            'brandData_10',
            'productData_10',
        ));
    }

    public function productDetails($id, $slug)
    {
        $product = Product::findOrFail($id);
        $colorEng = $product->color_eng;
        $productColorEng = explode(',',$colorEng);

        $colorBng = $product->color_bng;
        $productColorBng = explode(',',$colorBng);

        $sizeEng = $product->size_eng;
        $productSizeEng = explode(',',$sizeEng);

        $sizeBng = $product->size_bng;
        $productSizeBng = explode(',',$sizeBng);

        $images = MultipleImage::where('product_id', $id)->orderBy('id', 'DESC')->get();

        $categoryId = $product->category_id;
        $relatedProduct = Product::where('category_id', $categoryId)->where('id','!=',$id)->orderBy('id','DESC')->get();

        return view('user-view.product.product-details', compact('product', 'images',
        'productColorEng','productColorBng','productSizeEng','productSizeBng','relatedProduct'));
    }

    public function productTags($tag)
    {
        $categories = Category::orderBy('name_eng', 'ASC')->get();
        $products = Product::where('status', 1)
            ->where('tags_eng', $tag)
            ->orWhere('tags_bng', $tag)
            ->orderBy('id', 'DESC')
            ->paginate(3);
        return view('user-view.product-tags.products-view', compact('products', 'categories'));
    }

    public function SubcategoriesProduct($id, $slug)
    {
        $categories = Category::orderBy('name_eng', 'ASC')->get();
        $products = Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        return view('user-view.subcategory.products-view', compact('categories','products'));
    }

    public function SubsubcategoriesProduct($id, $slug)
    {
        $categories = Category::orderBy('name_eng', 'ASC')->get();
        $products = Product::where('status',1)->where('subsubcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        return view('user-view.sub-subcategory.products-view', compact('categories','products'));
    }

}
