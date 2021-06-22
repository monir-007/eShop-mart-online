<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'title' => $request->title,
            'description' => $request->description,
            'image' => $saveUrl,
        ]);
        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('slider.manage')->with($notification);
    }

    public function edit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('sliders'));
    }

    public function update(Request $request)
    {
        $sliderId = $request->id;
        $oldImage = $request->oldImage;

        if ($request->file('image')) {
            unlink($oldImage);
            $image = $request->file('image');
            $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('images/upload/sliders/' . $nameGenarate);
            $saveUrl = 'images/upload/sliders/' . $nameGenarate;

            Slider::findOrFail($sliderId)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $saveUrl
            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('slider.manage')->with($notification);
        }

        Slider::findOrFail($sliderId)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('slider.manage')->with($notification);
    }
}
