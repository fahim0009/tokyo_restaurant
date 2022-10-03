<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profileInfo(Request $request){
        $data =   User::find(Auth::id());
        if($data ==null){
            $data = 'Data Not Found';
        }
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ]; 
        return response()->json($responseArray,200);
    }

    public function profileUpdate(Request $request){
        $emailchk = User::where('email','=', $request->email)->where('id','!=', Auth::id())->first();
        if (empty($emailchk)) {
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            if (!empty($user))
            {
                return response()->json(['success'=>true,'response'=> $user], 200);
            }
            else{
                return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
            }
        } else {
            return response()->json(['success'=>false,'response'=> 'This email already have an account. Please try to another one. Thank You.'], 404);
        }
    }

    public function passwordUpdate(Request $request) {

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                $responseArray = [
                    'status'=>'Password updated successfully',
                    'data'=>$user
                ]; 
                return response()->json($responseArray,200);
            }else{
                return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
            }

        }else{
            return response()->json(['success'=>false,'response'=> 'Something went wrong!'], 404);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }





}
