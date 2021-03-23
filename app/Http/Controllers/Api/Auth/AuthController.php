<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Auth\Traits\AuthFunctions ;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthFunctions;

    public function login(Request $request){

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json( [
                "message" => "wrong credentials",
                "states" => false
            ] , 401 );
        }

      return  $this->loginToken(auth()->user());
    }

    public function logout(){
        auth()->user()->currentAccessToken()->delete();
        return $this->logoutMessage();
    }

    public function logoutAll(){
        auth()->user()->tokens()->delete();
        return $this->logoutAllMessage();
    }

    public function logoutAllExcept(){
        foreach (auth()->user()->tokens as $token) {
            if(auth()->user()->currentAccessToken()->id !== $token->id) {
                auth()->user()->tokens()->where('id', $token->id)->delete();
            }
        }

        return $this->logoutAllExeptMessage();
    }


}
