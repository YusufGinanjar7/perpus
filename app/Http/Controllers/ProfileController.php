<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        return view('user.profile', compact('user')); // Mengirim data pengguna ke tampilan
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi data yang diterima
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Update data pengguna
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->save();

        // Kembalikan response JSON
        return redirect()->route('profile');
    }
}
