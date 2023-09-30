<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\API\BaseController as BaseController;
use Laravel\Sanctum\Sanctum;

class Authentificate extends Controller
{
    public function login(Request $request)
    {
      $user=User::where('email',$request->email)->first();
      if(Hash::check($request->password,$user->password)){
       $token=$user->createToken('token')->plainTextToken;

       $cookie=cookie('jwt', $token , minutes:60*24);
        //un jour
          return response()->json([
                'user' => $user,
                'token' => $token
        ]);
        }
    }

   
    public function logout(Request $request){
      
       if($token=$request->bearerToken()){
        $model=Sanctum::$personalAccessTokenModel;
        $accessToken=$model::findToken($token);
        $accessToken->delete();
        return Response('',204);
       }
       return response()->noContent();
    }
     public function register(Request $request)
    {
        $user= User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);
        return response()->json([
            'user'=>$user
        ]);
       
    }
   
}
