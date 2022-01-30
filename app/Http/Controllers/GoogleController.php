<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();;
    }

    public function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $auth = User::where('email', '=', $user->email)->first();
        if ($auth) {
            Auth::login($auth);
            if ($auth->role == 'staff') {
                return  redirect('admin');
            } else {
                return  redirect('/');
            }
        }
        return  redirect('register')->with('email_data', $user->email);
        // } else {

        //     echo 'todak ada';
        // }
    }
}
