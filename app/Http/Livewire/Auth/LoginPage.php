<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class LoginPage extends Component
{
    public $email, $password;
    public $forgetEmail;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];
    protected $listeners = ['resultSend', 'loginSuccess'];

    public function loginSuccess()
    {
        return true;
    }

    public function resultSend()
    {
        return true;
    }
    public function sendEmail()
    {
        $this->validate([
            'forgetEmail' => 'required|email|exists:users,email',
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $this->forgetEmail,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => url('forget/' . $token)], function ($message) {
            $message->to($this->forgetEmail);
            $message->subject('Reset Password');
        });
        $this->emit("resultSend");
    }

    public function login()
    {
        $data = $this->validate();
        $user = User::where('email', '=', $this->email)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                if (Auth::attempt($data)) {

                    if ($user->role == "staff") {

                        $this->redirect('admin/home');
                    } else {
                        $this->redirect('');
                    }
                    $this->emit("loginSuccess");
                }
            } else {
                $this->addError('email', 'Password is invalid');
            }
        } else {
            $this->addError('email', 'Account not found');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-page')->extends('layouts.auth')
            ->section('content');;
    }
}
