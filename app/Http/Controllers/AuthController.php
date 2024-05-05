<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {

        return view('Admin.auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/Admin');
            }
        } else {
            return redirect('/login')->withErrors([
                'email' => 'Email atau kata sandi tidak valid.',
            ]);
        }
    }
    

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
