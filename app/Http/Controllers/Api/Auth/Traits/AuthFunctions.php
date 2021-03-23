<?php


namespace App\Http\Controllers\Api\Auth\Traits;


trait AuthFunctions
{

    private function loginToken($user){

        $token = $user->createToken('api-token')->plainTextToken ;

        return response()->json( [
             'token' => 'Bearer '.$token,
              'status' => true,
              'user' => [
                  'first_name' => $user->name,
                  'email' => $user->email
              ]
        ] , 202 );
    }

    private function logoutMessage(){
        return response()->json( [
                                    'message' => 'logged out successfully',
                                    'status' => true
                 ] , 202);
    }

    private function logoutAllMessage(){

        return response()->json( [
            'message' => 'logged out All successfully',
            'status' => true
        ] , 202);

    }

    private function logoutAllExeptMessage(){

        return response()->json( [
            'message' => 'logged out of All other devices successfully',
            'status' => true
        ] , 202);

    }

}
