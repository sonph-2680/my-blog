<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the form for login.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return view('auth.login');
    }

    /**
     * Attempt to login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
        }
        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->route('home');
        }

        if (User::where('email', $request->email)->first() == null) {
            $error = ['email' => 'EMail is not registered yet'];
        } else {
            $error = ['password' => 'Password is not correct'];
        }

        return redirect()->back()
            ->withInput($request->only(['email', 'password']))
            ->withErrors($error);
    }
}
