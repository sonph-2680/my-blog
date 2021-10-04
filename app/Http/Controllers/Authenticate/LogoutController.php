<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Show the form for login.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return view('auth.login');
    }
}
