<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;

class CartController extends Controller
{
    public function coupon(Request $request)
    {
        
        $code = $request->code;
        $total = (float)preg_replace('/[^0-9\.]/ui','',$_GET['total']);;
        $fnd = Coupon::where('code','=',$code)->get()->count();
        if($fnd < 1)
        {
        return response()->json(['success'=>false,'response'=> 'Unavailable coupon discount!'], 404);             
        }
        else{
        $coupon = Coupon::where('code','=',$code)->first();
            
        if($coupon->times != null)
        {
            if($coupon->times == "0")
            {
                return response()->json(['success'=>false,'response'=> 'Unavailable coupon discount!'], 404);                 
            }
        }
        $today = date('Y-m-d');
        $from = date('Y-m-d',strtotime($coupon->start_date));
        $to = date('Y-m-d',strtotime($coupon->end_date));
        if($from <= $today && $to >= $today)
        {
            if($coupon->status == 1)
            {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                // $val = Session::has('already') ? Session::get('already') : null;
                
                $cart = new Cart($oldCart);
                if($coupon->type == 0)
                {
                    // Session::put('already', $code);
                    $coupon->percent = (int)$coupon->percent;
                    $val = $total / 100;
                    $sub = $val * $coupon->percent;
                    $total = $total - $sub;
                    $data[0] = round($total,2);
                    
                    $data[1] = $code;      
                    $data[2] = round($sub, 2);
                    Session::put('coupon', $data[2]);
                    Session::put('coupon_code', $code);
                    Session::put('coupon_id', $coupon->id);
                    Session::put('coupon_total', $data[0]);
                    $data[3] = $coupon->id;
                    $data[4] = $coupon->price."%";
                    $data[5] = 1;

                    Session::put('coupon_percentage', $data[4]);
                     
                    return response()->json(['success'=>true,'response'=> $data], 200); 
                }
                else{

                    // Session::put('already', $code);
                    $total = $total - round($coupon->price,2);
                    $data[0] = round($total,2);
                    $data[1] = $code;
                    $data[2] = round($coupon->price, 2);
                    Session::put('coupon', $data[2]);
                    Session::put('coupon_code', $code);
                    Session::put('coupon_id', $coupon->id);
                    Session::put('coupon_total', $data[0]);
                    $data[3] = $coupon->id;

                    Session::put('coupon_percentage', 0);

                    $data[5] = 1;
                    return response()->json(['success'=>true,'response'=> $data], 200);             
                }
            }
            else{
                return response()->json(['success'=>false,'response'=> 'This coupon is not active!'], 404);   
            }              
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Coupon discount time over!'], 404);            
        }
        }         
    } 
}
