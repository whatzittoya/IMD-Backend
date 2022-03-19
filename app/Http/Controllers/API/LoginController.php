<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ExponentPhpSDK\Expo;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $device_id = $request->device_id;
      
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            try {
                //save expo token for notification
                $user->pushTokens()->firstOrCreate(
                    ['token' => $device_id],
                );

                //refresh token user for api authentication
                $user->tokens()->delete();
                $token = $user->createToken($device_id)->plainTextToken;
            } catch (\Throwable $th) {
                //return userid has been login on another device
                return response()->json([
                'message' => 'User has been login on another device',
                'status' => 'error',
                'data' => $th->getMessage(),
            ], 401);
            }

            
            return response()->json(['token' => $token,'user'=>$user,'role'=>$user->getRoleNames()], 200);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $request->user()->pushTokens()->delete();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
