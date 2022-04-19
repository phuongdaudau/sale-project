<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
use App\Models\Commune;

class DeliveryFeeController extends Controller
{
    public function addDeliveryFee(Request $request){
        $cities = City::orderBy('id', 'ASC')->get();
        return view('master.ship.delivery-fee.create', compact('cities'));
    }

    public function loadDistrict($idCity){
        $id = '0'. $idCity;
        $districts = District::where('city_id', $id)->orderBy('id', 'ASC')->get();
        return view('master.ship.delivery-fee.load-district', compact('districts'));
    }
    public function loadCommune($idDistrict){
        $id = '0'. $idDistrict;
        $communes = Commune::where('district_id', $id)->orderBy('id', 'ASC')->get();
        return view('master.ship.delivery-fee.load-commune', compact('communes'));
    }
}
