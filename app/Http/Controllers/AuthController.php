<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    function login(){
        return view('login');
    }

    public function verified(EmailVerificationRequest $request)
    {
        $user = $request->user();

        // Memeriksa apakah email_verified_at sudah terisi dan mengubah status menjadi 'active'
        if ($user->email_verified_at !== null && $user->status === 'inactive') {
            $user->update(['status' => 'active']);
        }

        // Redirect ke halaman setelah verifikasi
        return redirect()->route('index'); // Ganti dengan route yang sesuai
    }

    function autentikasi(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Memeriksa jika email sudah diverifikasi dan status masih 'inactive', ubah status menjadi 'active'
            if ($user->email_verified_at !== null && $user->status === 'inactive') {
                $user->update(['status' => 'active']);
            }


            // Mengarahkan berdasarkan role
            $role = Auth::user()->role_id;
            if ($role == 1) {
                return redirect()->route('dashboard');
            } elseif ($role == 2) {
                return redirect()->route('index');
            } else {
                return redirect()->route('welcome')->with('error', 'Role tidak dikenali.');
            }

        }
        Session::flash('error', 'Email atau Password salah.');
        return redirect()->route('login')->withInput();

        // Jika gagal, kembalikan ke halaman login
        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->withInput();
    }

    function register() {
        return view('register');
    }

    function createUser(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'fullname' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required']
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => 'inactive',
            'role_id' => 2, // Default sebagai user
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect('/profile');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
