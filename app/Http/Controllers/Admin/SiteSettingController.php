<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function siteSetting()
    {
        $setting = SiteSetting::find(1);
        return view('admin.settings.update-setting', compact('setting'));
    }

    public function siteSettingUpdate(Request $request): RedirectResponse
    {
        $settingId = $request->id;
        if ($request->file('logo')) {

            $image = $request->file('logo');
            $nameGenarate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(139, 36)->save('images/upload/logo/' . $nameGenarate);
            $saveUrl = 'images/upload/logo/' . $nameGenarate;

            SiteSetting::findOrFail($settingId)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'logo' => $saveUrl,
            ]);

            $notification = array(
                'message' => 'Setting Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }

        SiteSetting::findOrFail($settingId)->update([
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
        ]);

        $notification = array(
            'message' => 'Setting Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function seoSetting()
    {
        $SEO = SEO::find(1);
        return view('admin.settings.SEO-update',compact('SEO'));
    }

    public function seoSettingUpdate(Request $request)
    {
        $SEOId = $request->id;

        SEO::findOrFail($SEOId)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
        ]);

        $notification = array(
            'message' => 'SEO info Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
