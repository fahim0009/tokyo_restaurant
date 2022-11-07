<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Auth;

class CouponController extends Controller
{
    public function index()
    {
        $data = Coupon::orderby('id','DESC')->get();
        return view('admin.coupon.index',compact('data'));
    }

    public function store(Request $request)
    {

        $coupon_code = Coupon::where('code', $request->code)->count();
        if( $coupon_code == 1){
            $message ="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This coupon code already added.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $data = new Coupon();
        $data->code = $request->code;
        $data->price = $request->price;
        $data->percent = $request->percent;
        $data->quantity = $request->quantity;
        $data->value = $request->value;
        $data->type = $request->type;
        $data->times = $request->times;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        
        $data->created_by= Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Coupon::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        $data = Coupon::find($id);

        $data->code = $request->code;
        $data->price = $request->price;
        $data->percent = $request->percent;
        $data->quantity = $request->quantity;
        $data->value = $request->value;
        $data->type = $request->type;
        $data->times = $request->times;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->updated_by= Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function delete($id)
    {
        if(Coupon::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }


    public function activecoupon(Request $request)
    {
        $user = Coupon::find($request->id);
        $user->status = $request->status;
        $user->save();

        if($request->status==1){
            $user = Coupon::find($request->id);
            $user->status = $request->status;
            $user->save();
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Active Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            $user = Coupon::find($request->id);
            $user->status = $request->status;
            $user->save();
            $message ="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Inactive Successfully.</b></div>";
        return response()->json(['status'=> 300,'message'=>$message]);
        }

    }




}
