<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ForgetPassword extends Component
{
    public $password_confirmation, $password, $token;
    protected $rules = [
        'password' => 'required|min:8|confirmed'
    ];

    public function mount($token)
    {
        $this->token = $token;
    }


    public function save()
    {
        $updatePassword = DB::table('password_resets')
            ->where([
                'token' => $this->token
            ])
            ->first();


        if (!$updatePassword) {
            return redirect('');
        }

        $user = User::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($this->password)]);

        DB::table('password_resets')->where(['email' => $updatePassword->email])->delete();

        return redirect('/login')->with('status', 'Password telah diubah silahkan login menggunakan password baru');
    }

    public function render()
    {
        return view('livewire.auth.forget-password')->extends('layouts.auth')
            ->section('content');
    }
}
