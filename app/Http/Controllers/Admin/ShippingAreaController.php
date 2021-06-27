<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function viewShippingDivision()
    {
        $shipDivisions = ShippingDivision::orderBy('id','DESC')->latest()->get();
        return view('admin.ship-area.division.view-division',compact('shipDivisions'));
    }

    public function divisionStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        ShippingDivision::insert([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'New division added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function divisionEdit($id)
    {
        $shipDivision= ShippingDivision::findOrFail($id);
        return view('admin.ship-area.division.edit-division',compact('shipDivision'));
    }

    public function divisionUpdate(Request $request, $id)
    {

        ShippingDivision::findOrFail($id)->update([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Division updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shipping-division.manage')->with($notification);
    }

    public function divisionDelete($id)
    {
        ShippingDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function viewShippingDistrict()
    {
        $shipDivision = ShippingDivision::orderBy('name','ASC')->get();
        $shipDistricts = ShippingDistrict::with('division')->orderBy('id','DESC')->latest()->get();
        return view('admin.ship-area.district.view-district',compact('shipDistricts','shipDivision'));
    }

    public function districtStore(Request $request)
    {
        $request->validate([
            'division_id'=>'required',
            'name' => 'required',
        ]);

        ShippingDistrict::insert([
            'division_id'=>$request->division_id,
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'New district added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function districtEdit($id)
    {
        $shipDivisions = ShippingDivision::orderBy('name','ASC')->get();
        $districts = ShippingDistrict::findOrFail($id);
        return view('admin.ship-area.district.edit-district',compact('shipDivisions','districts'));
    }

    public function districtUpdate(Request $request, $id)
    {
        ShippingDistrict::findOrFail($id)->update([
            'division_id'=>$request->division_id,
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'District updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shipping-district.manage')->with($notification);

    }

    public function districtDelete($id)
    {
        ShippingDistrict::findOrFail($id)->delete();
        $notification = [
            'message' => 'District deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
