<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function sliderManage()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.manage-slider', compact('sliders'));
    }

    public function insert()
    {
        $sliders = Slider::latest()->get();
        $products = Product::latest()->get();
        return view('admin.slider.index', compact('sliders', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ], [
            'image.required' => 'Select one image'
        ]);

        $image = $request->file('image');
        $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('images/upload/sliders/' . $nameGenarate);
        $saveUrl = 'images/upload/sliders/' . $nameGenarate;

        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$saveUrl,
        ]);
        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('slider.manage')->with($notification);
    }
}
