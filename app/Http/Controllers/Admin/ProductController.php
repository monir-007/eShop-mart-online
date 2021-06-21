<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultipleImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function insert()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.index', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('images/upload/products/thumbnail/' . $nameGenarate);
        $saveUrl = 'images/upload/products/thumbnail/' . $nameGenarate;

        $productId = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-', $request->name_eng)),
            'slug_bng' => str_replace(' ', '-', $request->name_bng),
            'code' => $request->code,

            'quantity' => $request->quantity,
            'tags_eng' => $request->tags_eng,
            'tags_bng' => $request->tags_bng,
            'size_eng' => $request->size_eng,
            'size_bng' => $request->size_bng,
            'color_eng' => $request->color_eng,
            'color_bng' => $request->color_bng,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_eng' => $request->short_description_eng,
            'short_description_bng' => $request->short_description_bng,
            'long_description_eng' => $request->long_description_eng,
            'long_description_bng' => $request->long_description_bng,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $saveUrl,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $images = $request->file('multipleImage');
        foreach ($images as $image) {
            $makeName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('images/upload/products/multiple-image/' . $makeName);
            $uploadPath = 'images/upload/products/multiple-image/' . $makeName;

            MultipleImage::insert([
                'product_id' => $productId,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.manage')->with($notification);
    }

    public function productManage()
    {
        $products = Product::latest()->get();
        return view('admin.product.product-view', compact('products'));
    }
}
