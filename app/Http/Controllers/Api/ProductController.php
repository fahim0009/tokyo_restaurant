<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Favourite;
use Illuminate\Support\Facades\DB;
Use Image;
use Illuminate\support\Facades\Auth;

class ProductController extends Controller
{
    public function getallproduct(){
        $data =  Product::all();
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ]; 
        return response()->json($responseArray,200);
    }


    public function favlist(){

        $favlists = DB::table('favourites')
            ->join('products','favourites.product_id','=','products.id')
            ->select('favourites.id','favourites.product_id','favourites.user_id','products.name','products.image','products.price')
            ->get();
        if (!empty($favlists))
        {
            return response()->json(['success'=>true,'response'=> $favlists], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Favourite list is empty!'], 404);
        }
    }
    public function favlistAdd($id){

        if (Auth::user()) {
            $check = Favourite::where('product_id', $id)->where('user_id', Auth::id())->first();
            if (empty($check)) {
                $data = new Favourite();
                $data->product_id = $id;
                $data->user_id = Auth::id();
                $data->save();
                return response()->json(['success' => true, 'response' => $data], 200);

            } else {
                return response()->json(['success' => false, 'response' => 'This Product already added to Favourite list'], 404);
            }
        }else {
            return response()->json(['success' => false, 'response' => 'Login first to add Favourite list'], 404);
        }
    }
    public function favlistRemove($id){
        $data = Favourite::where('id', $id)->where('user_id', Auth::id())->first();
        if (!empty($data))
        {
            $data->delete();
            return response()->json(['success'=>true,'response'=> 'Favourite deleted Successfully!!!'], 200);
        }
        else{
            return response()->json(['success'=>false,'response'=> 'Favourite is empty!!!'], 404);
        }
    }
}
