<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingDivision;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function viewShippingDivision()
    {
        $shipDivisions = ShippingDivision::orderBy('id','DESC')->latest()->get();
        return view('admin.ship-area.view-divisions',compact('shipDivisions'));
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
        return view('admin.ship-area.edit-divisions',compact('shipDivision'));
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
}
