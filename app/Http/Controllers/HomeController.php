<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Contracts\View\View;

final class HomeController
{
    public function index(): View
    {
        $profile = Profile::where('email', 'degermann.julien@gmail.com')->first();
        $profiles = Profile::all();
        return view('home', ['profile' => $profile, "profiles" => $profiles]);
    }

    /**
     * show page with profile's details
     * @param int $id - id of profile to show
     * @return View - view with profile details
     */
    public function showProfile(int $id): View
    {
        $profile = Profile::findOrFail($id);
        return view('show_profile', ['profile' => $profile]);
    }
}
