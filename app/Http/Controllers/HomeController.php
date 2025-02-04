<?php

namespace App\Http\Controllers;

use App\Models\Profile;

final class HomeController
{
    public function index()
    {

        $profile = Profile::where('email', 'degermann.julien@gmail.com')->first();
        $profiles = Profile::all();
        return view('home', ['profile' => $profile, "profiles" => $profiles]);
    }
}
