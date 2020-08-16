<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ApiLogoutController extends Controller {

    use AuthenticatesUsers;


    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {

        $this->guard()->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        DB::insert(
            'insert into user_auth_logs (time, handle,user_id,ip,action) values (current_timestamp, ?,?,?,?)', [
                                                                                                                 Auth::user()->handle,
                                                                                                                 Auth::user()->id,
                                                                                                                 $request->ip(),
                                                                                                                 'logout'
                                                                                                             ]
        );

        return new Response('', 204);
    }
}
