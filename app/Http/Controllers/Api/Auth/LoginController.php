<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResponse;
use App\Http\Resources\TokenResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        $credentials = request()->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return new TokenResource(auth()->user());

        }

        return new GeneralResponse(
            null,
            401,
            'Sorry the credentials you are using are invalid',
            false
        );

    }
}
