<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register(StoreUser $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        return User::create($data); 
    }
    public function forgotPassword(Request $request)
    {
        $user = User::first();

        $mail = Mail::to('f.ibnu.a1@gmail.com')->send(new ForgotPassword($user));
        return $mail ? 'success' : 'gagal';
    }
}
