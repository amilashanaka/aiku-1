<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', 'LoginController@authenticate');
Route::middleware('logout')->post('/logout', 'LogoutController@logout');
Route::post('/token', 'ApiTokenController@authenticate');


Route::middleware('auth:sanctum')->get(
    '/user', function (Request $request) {
    return $request->user();
}
);
