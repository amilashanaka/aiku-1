<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\User;

class LoginController extends Controller {
    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request) {


        $credentials = $request->only('handle', 'password');
        data_set($credentials, 'status', 'Active');


        if (Auth::attempt($credentials)) {

        } else {

        }
    }

    public function token(Request $request) {
        $request->validate(
            [
                'handle'      => 'required',
                'password'    => 'required',
                'device_name' => 'required',
            ]
        );

        $user = User::where('handle', $request->handle)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {

            throw ValidationException::withMessages(
                [
                    'email' => ['The provided credentials are incorrect.'],
                ]
            );
        }

        return response()->json([
                                    'token' => $user->createToken($request->device_name)->plainTextToken,
                                ]);


    }
}
