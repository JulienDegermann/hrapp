<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Profile;
use Illuminate\Contracts\View\View;

final class HomeController
{
    public function index(): View
    {
        $profile = Profile::where('email', 'degermann.julien@gmail.com')->first();
        $profiles = Profile::all();
        $jobs = Job::all();
        return view('home', ['profile' => $profile, "profiles" => $profiles, 'jobs' => $jobs]);
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

    /**
     * show page with job's details
     * @param int $id - id of Job to show
     * @return View - view with job details
     */
    public function showJob(int $id): View
    {
        $job = Job::findOrFail($id);
        return view('show_job', ['job' => $job]);
    }

    /**
     * show page with job's details
     * @param int $id - id of Job to apply
     * @return View - view with apply form
     */
    public function applyForJob(int $id): View
    {
        $job = Job::findOrFail($id);
        return view('apply_job', ['job' => $job]);
    }
}
