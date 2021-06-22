<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultipleImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\AssignOp\Mul;

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
        return view('admin.product.product-manage', compact('products'));
    }

    public function edit($id)
    {
        $multipleImages = MultipleImage::where('product_id', $id)->get();

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subSubcategories = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);

        return view('admin.product.edit', compact('products', 'categories', 'brands', 'subcategories', 'subSubcategories', 'multipleImages'));
    }

    public function update(Request $request)
    {
        $productId = $request->id;

        Product::findOrFail($productId)->update([
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

            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product updated without image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.manage')->with($notification);
    }

    public function productImageupdate(Request $request)
    {
        $images = $request->multipleImage;
        foreach ($images as $id => $image) {
            $imageRemove = MultipleImage::findOrFail($id);
            unlink($imageRemove->photo_name);
            $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('images/upload/products/multiple-image/' . $nameGenarate);
            $uploadPath = 'images/upload/products/multiple-image/' . $nameGenarate;

            MultipleImage::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Product image updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function productThumbnailUpdate(Request $request)
    {
        $productId = $request->id;
        $oldImage = $request->oldImage;
        unlink($oldImage);

        $image = $request->file('product_thumbnail');
        $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('images/upload/products/thumbnail/' . $nameGenarate);
        $saveUrl = 'images/upload/products/thumbnail/' . $nameGenarate;

        Product::findOrFail($productId)->update([
            'product_thumbnail' => $saveUrl,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Product cover thumbnail updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productImageDelete($id)
    {
        $deleteImage = MultipleImage::findOrFail($id);
        unlink($deleteImage->photo_name);
        MultipleImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image removed Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function productDetails($id)
    {
        $multipleImages = MultipleImage::where('product_id', $id)->get();

        $products = Product::findOrFail($id);

        return view('admin.product.details', compact('products', 'multipleImages'));
    }

    public function productStatusActive($id)
    {
        Product::findOrFail($id)->update([
            'status' => 1
        ]);

        $notification = array(
            'message' => 'Product activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productStatusInactive($id)
    {
        Product::findOrFail($id)->update([
            'status' => 0
        ]);

        $notification = array(
            'message' => 'Product deactivated.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $imageId = MultipleImage::where('product_id', $id);
        $images = $imageId ->get();
        foreach ($images as $image) {
            unlink($image->photo_name);
            $imageId->delete();
        }

        $notification = array(
            'message' => 'Product deleted successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}
