<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\ValidationException;


class ApiLoginController extends Controller {


    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(Request $request) {


        $credentials = $request->only('handle', 'password');
        data_set($credentials, 'status', 'Active');


        if (Auth::attempt($credentials)) {
            return response()->json(
                [
                    'user' => Auth::user(),
                    'permissions' => Auth::user()->getAllPermissions(),
                    'userable'=>Auth::user()->userable
                ]
            );
        } else {
            throw ValidationException::withMessages(
                [
                    'handle' => ['The provided credentials are incorrect.'],
                ]
            );
        }
    }


}
