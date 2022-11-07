<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryCharge;
use Illuminate\support\Facades\Auth;

class DeliveryChargeController extends Controller
{
    public function index()
    {
        $data = DeliveryCharge::orderby('id','DESC')->get();
        return view('admin.delivery.index',compact('data'));
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = DeliveryCharge::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        $data = DeliveryCharge::find($id);
        $data->order_amount = $request->order_amount;
        $data->amount = $request->amount;
        $data->updated_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }


}
