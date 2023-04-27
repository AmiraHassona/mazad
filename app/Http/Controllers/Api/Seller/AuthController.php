<?php

namespace App\Http\Controllers\Api\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validateSeller = Validator::make($request->all(),
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validateSeller->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateSeller->errors()
            ], 401);
        }

        if ( Auth::guard('seller')->attempt(['email' => $request->email ,'password' => $request->password])) {
            $seller = Seller::where('email', $request->email)->first();
            return response()->json([
                'status' => true,
                'message' => 'Seller Logged In Successfully',
                'token' => $seller->createToken("API TOKEN")->plainTextToken
            ], 200);
        }{
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }
    }

}
