<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Profile;
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

    /**
     * Display all profiles
     * @return View - display all profiles
     */
    public function showProfiles(): View
    {
        $profiles = Profile::All();

        return view('admin/admin_profiles', ['profiles' => $profiles]);
    }


    /**
     * Display the details of a profile
     * @param int $id - id of the profile to show
     * @return View - display the profile
     */
    public function showProfile(int $id): View
    {
        $profile = Profile::find($id);

        return view('admin/admin_profile_show', ['profile' => $profile]);
    }


    /**
     * Display the form to create a profile
     * @param int $id - id of the profile to delete
     * @return View - display the form to create a profile
     */
    public function deleteProfile(int $id): RedirectResponse
    {
        $profile = Profile::find($id);
        $profile->delete();
        return redirect()->route('admin.profiles');
    }

    /**
     * save a new profile
     * @param Request $request
     * @return RedirectResponse - redirect to the profiles page
     */
    public function saveProfile(Request $request, SaveProfileService $saveProfile): RedirectResponse
    {
        $datas = $request->all();

        $profile = new Profile;

        if ($profile) {
            try {
                $profile = $saveProfile->editAndSaveProfile($datas, $profile);
            } catch (Exception $e) {
                dd($e);
            }
        }

        return redirect()->route('admin.profiles');
    }

    /**
     * create a new profile
     * @return View - display the form to create a profile
     */
    public function createProfile(): View
    {
        return view('admin.admin_profile_edit');
    }

    /**
     * edit a profile
     * @param int $id - id of the profile to edit
     * @return View - display the form to edit a profile
     */
    public function editProfile(int $id): View
    {
        $profile = Profile::find($id);
        return view('admin.admin_profile_edit', ['profile' => $profile]);
    }


    /**
     * save an edited profile
     * @param int $id - id of the edited profile
     * @param Request $request
     * @param ProfileImageService $profileImage - service which manage profile images
     * @return RedirectResponse - redirection to list
     */
    public function updateProfile(
        int $id,
        Request $request,
        SaveProfileService $saveProfile
    ): RedirectResponse {

        $datas = $request->all();
        $profile = Profile::find($id);

        if ($profile) {
            try {
                $profile = $saveProfile->editAndSaveProfile($datas, $profile);
            } catch (Exception $e) {
                dd($e);
            }
        }

        return redirect()->route('admin.profiles');
    }

    /**
     * update profile's experiences
     * @param int $id - profile's id
     * @param Request $request
     * @return RedirectResponse - redirection to edit page
     */
    public function updateProfileExperiences(
        int $id,
        Request $request,
        ProfileExperiences $profileExperiences
    ): RedirectResponse {
        $datas = $request->all();
        $profile = Profile::find($id);

        $profile = $profileExperiences->updateProfileExperiences($profile, $datas);

        return redirect()->route('admin.profiles');
    }
}
