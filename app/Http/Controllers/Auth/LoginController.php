<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $nom = $request->input('nom');
        $contrasenya = $request->input('contrasenya');
        $user = Usuari::where('nom',$nom)->first();

        if($user != null && Hash::check($contrasenya, $user->contrasenya))
        {
            Auth::login($user);
            return redirect('/home');
        }
        else
        {
            return redirect('login')->withInput();
        }
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}