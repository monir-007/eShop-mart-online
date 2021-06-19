<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_eng' => 'required',
            'name_bng' => 'required',
            'image' => 'required',
        ], [
            'name_eng.required' => 'Input Brand English Name',
            'name_bng.required' => 'Input Brand Bangla Name',
        ]);

        $image = $request->file('image');
        $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('images/upload/brands/' . $nameGenarate);
        $saveUrl = 'images/upload/brands/' . $nameGenarate;

        Brand::insert([
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-', $request->name_eng)),
            'slug_bng' => strtolower(str_replace(' ', '-', $request->name_bng)),
            'image' => $saveUrl,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Brand added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brandId = $request->id;
        $oldImage = $request->oldImage;

        if ($request->file('image')) {
            unlink($oldImage);
            $image = $request->file('image');
            $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('images/upload/brands/' . $nameGenarate);
            $saveUrl = 'images/upload/brands/' . $nameGenarate;

            Brand::findOrFail($brandId)->update([
                'name_eng' => $request->name_eng,
                'name_bng' => $request->name_bng,
                'slug_eng' => strtolower(str_replace(' ', '-', $request->name_eng)),
                'slug_bng' => strtolower(str_replace(' ', '-', $request->name_bng)),
                'image' => $saveUrl,
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('brand.index')->with($notification);
        }

        Brand::findOrFail($brandId)->update([
            'name_eng' => $request->name_eng,
            'name_bng' => $request->name_bng,
            'slug_eng' => strtolower(str_replace(' ', '-', $request->name_eng)),
            'slug_bng' => strtolower(str_replace(' ', '-', $request->name_bng)),
        ]);

        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('brand.index')->with($notification);
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $image = $brand->image;
        unlink($image);

        Brand::findOrFail($id)->delete();

        return redirect()->back();
    }

}
