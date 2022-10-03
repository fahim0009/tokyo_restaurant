<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Dotenv\Validator as DotenvValidator;
use Validator;
class LoginController extends Controller
{
    /// login //////

    public function login(Request $request){ 
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $responseArray = [];
            $responseArray['token'] = $user->createToken('MyApp')->accessToken;
            $responseArray['name'] = $user->name;
            
            return response()->json($responseArray,200);

        }else{
            return response()->json(['error'=>'Unauthenticated'],203);
        }
    }
}
