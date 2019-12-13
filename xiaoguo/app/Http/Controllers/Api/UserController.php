<?php

namespace App\Http\Controllers\Api;
use App\http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Http\Controllers\Auth\RegisterController;
class UserController extends Controller
{
    public function __construct(){}
    public function hello()
    {
        $field = [
            'name'        => null,
            'sex'      => null,
            'age'  => null,
        ];
    
        return  ['ret'=>1,'code'=>400];
    }

    public function authenticate(Request $request){
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function register(Request $request){
        $userData  = $request->only('name','email', 'password');
        
        app(RegisterController::class)->create($userData);
    }
    

}