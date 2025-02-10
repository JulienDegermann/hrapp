<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Profile;
use App\Services\Profile\ExperiencePicture;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\Profile\ProfileImageService;
use App\Services\Profile\SaveProfileService;
use App\Services\Profile\ProfileExperiences;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Display the admin page
     * @return View
     */
    public function index(): View
    {
        $profiles = Profile::all();

        return view('admin.admin', ['profiles' => $profiles]);
    }
}
