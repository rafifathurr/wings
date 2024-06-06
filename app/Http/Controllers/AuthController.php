<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Login::where('user', $request->username)->first();

        if (is_null($user)) {
            return redirect()->back()->withErrors(['username' => 'User tidak terdaftar'])->withInput();
        }

        if (Auth::attempt(['user' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            // For Request Url
            $intendedUrl = session()->pull('url.intended', route('home'));
            return redirect()->to($intendedUrl);
        } else {
            return redirect()->back()->withErrors(['password' => 'Password atau Username tidak sesuai'])->withInput();
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
