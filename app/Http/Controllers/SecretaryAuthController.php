<?php

namespace App\Http\Controllers;

use App\Models\Secretary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecretaryAuthController extends Controller
{
    public function index()
    {
        return view('Secretary.auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $secretary = Secretary::where('email', $credentials['email'])->first();

        if ($secretary && Hash::check($credentials['password'], $secretary->password)) {
            if ($secretary->status == 1) {
                Auth::guard('secretaries')->login($secretary);
                $request->session()->regenerate();
                return redirect()->route('Secretary.dashboard');
            }
        } else {
            return redirect('sekretaris/login')->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/sekretaris/login');
    }
}
