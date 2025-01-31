<?php

namespace App\Http\Controllers;

use App\Models\Profile;

final class HomeController
{
    public function index()
    {
        $profiles = Profile::all();
        return view('home', ['profiles' => $profiles]);
    }
}
