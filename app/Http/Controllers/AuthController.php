<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $user = User::where('username', $request->username)
            ->where('password', md5($request->password))
            ->first();

        if ($user) {

            session([
                'login' => true,
                'username' => $user->username
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Login gagal');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}
