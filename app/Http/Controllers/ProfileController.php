<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile_setup()
    {
        return view('profiles.profile');
    }
}
