<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    ////// PASSPORT LOGIN & REGISTER /////////////

    public function register(Request $request){ 

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $responseArray = [];
        $responseArray['token'] = $user->createToken('MyApp')->accessToken;
        $responseArray['name'] = $user->name;
        $responseArray['messege'] = "Thank you. Your registration completed";
        
        return response()->json($responseArray,200);  
    }

    public function userDetails($id){
        $data =  User::where('id','=',$id)->first();
        if($data ==null){
            $data = 'Data Not Found';
        }
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ]; 
        return response()->json($responseArray,200);
    }
}
