<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function index() {

        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        User::where('email', $credentials);
      
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Success', 'Login success !');
            $user = Auth::user();
          
            if ($user->role_id === 1) {
                return redirect()->intended('/admin');
            }

            elseif ($user->role_id === 2) {
                return redirect()->intended('/customer');
            }
        } else {
            Alert::error('Error', 'Login failed !');
            return redirect('/login');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Log out success !');
        return redirect('/login');
    }

}
