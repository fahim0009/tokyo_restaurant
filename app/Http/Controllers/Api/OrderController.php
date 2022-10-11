<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
Use Image;
use Illuminate\support\Facades\Auth;

class OrderController extends Controller
{
    public function allOrder(){

        $order = Order::where('user_id','=', Auth::user()->id)->get();
            if ($order) {
                return response()->json(['success'=>true,'response'=> $order], 200);
            } else {
                return response()->json(['success'=>true,'response'=> 'Order not yet done. Please create a new order'], 404);
            }
    }


    public function storeorder(Request $request)
    {
                
        
        $data['user_id'] = Auth::User()->id;
        $data['shipping_address'] = $request['shipping_address'];
        $data['payment_status'] = "Unpaid";
        $data['delivery_status'] = "Pending";
        // $data['grand_total'] = $request['grand_total'];
        $data['shipping_cost'] = $request['shipping_cost'];
        $data['discount'] = $request['discount'];
        // $data['net_total'] = $request['net_total'];
        $data['invoice_code'] = date('Ymd-his');
        $data['status'] = 0;
        $order = Order::create($data);

        if ($order){
            $allProducts = json_decode($request->cart, true);
            $grand_total = 0;

            foreach ($allProducts as $item)
            {
                $grand_total += $item['price']*$item['quantity'];

                $product['order_id'] = $order->id;
                $product['product_id'] = $item['product_id'];
                $product['name'] = $item['name'];
                $product['quantity'] = $item['quantity'];
                $product['price'] = $item['price'];
                $product['each_total_price'] = round( $item['price'] * $item['quantity']);
                OrderDetail::create($product);
            }

            $order->grand_total = $grand_total;
            $order->net_total = $grand_total + $order->shipping_cost - $order->discount;
            
            if($order->save()){
            
            $success['response'] = 'Order submitted successfully';
            $success['order'] = $order;
            $success['product'] = $product;
            return response()->json(['success'=>true,'response'=> $success], 200);  
            }

        }else {
            return response()->json(['success'=>true,'response'=> 'Server Error!!'], 404);
        }
    }

    

}
