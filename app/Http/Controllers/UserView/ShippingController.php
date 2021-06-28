<?php

namespace App\Http\Controllers\UserView;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function getDistrict($id)
    {
        $shipDistricts = ShippingDistrict::where('division_id',$id)->orderBy('name','ASC')->get();
        return json_encode($shipDistricts);
    }
    public function getState($id)
    {
        $shipState = ShippingState::where('district_id',$id)->orderBy('name','ASC')->get();
        return json_encode($shipState);
    }
}
