<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryCharge;
use Illuminate\support\Facades\Auth;

class DeliveryChargeController extends Controller
{
    public function deliverycharge(){

        $deliverycharge = DeliveryCharge::where('id','=', 1)->first();
            if ($deliverycharge) {
                return response()->json(['success'=>true,'response'=> $deliverycharge], 200);
            } else {
                return response()->json(['success'=>true,'response'=> 'Server Error!!'], 404);
            }
    }
}
