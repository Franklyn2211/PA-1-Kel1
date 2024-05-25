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
            } else {
                return redirect()->back()->withErrors(['email' => 'Access denied. Akun anda belum di setujui admin.']);
            }
        } else {
            return redirect('sekretaris/login')->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }
    }
    public function register()
    {
        return view('Secretary.auth.register', [
            'title' => 'Register',
        ]);
    }
    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:secretaries',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);

        $validated['password'] = Hash::make($request['password']);
        $validated['status'] = 0; // Default status to 0 (not approved)

        Secretary::create($validated);

        return redirect('sekretaris/login')->with('success', 'Register berhasil, Menunggu persetujuan dari Admin.');
    }
    public function showChangePasswordForm()
    {
        return view('Secretary.auth.change-password');
    }
    public function changePassword(Request $request)
    {
         $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $secretary = Auth::guard('secretaries')->user();

        // Check if the current password matches the password in the database
        if (!Hash::check($request->input('current_password'), $secretary->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update the secretary's password
        $secretary->password = Hash::make($request->input('new_password'));
        $secretary->save();

        return redirect()->route('Secretary.dashboard')->with('success', 'Password berhasil di ganti.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/sekretaris/login');
    }
}
