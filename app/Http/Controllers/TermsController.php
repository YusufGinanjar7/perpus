<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function show()
    {
        return view('user.terms'); // Pastikan view ini ada
    }
}
