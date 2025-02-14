<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Skill;
use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\Profile\ExperiencePicture;
use App\Services\Profile\ProfileExperiences;
use App\Services\Profile\SaveProfileService;
use App\Services\Profile\ProfileImageService;
use Symfony\Component\HttpFoundation\RedirectResponse;

final class AdminProfileController
{
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
    public function deleteProfile(
        int $id,
        ProfileImageService $profileImage,
        ExperiencePicture $expPicture
    ): RedirectResponse {
        $profile = Profile::find($id);

        // unlink images
        if (isset($profile->picture)) {
            $profileImage->deleteProfileImage($profile);
        }
        foreach ($profile->experiences as $exp) {
            if ($exp->picture) {
                $expPicture->deleteExperienceImage($exp);
            }
        }
        $profile->delete();
        return redirect()->route('admin.show_profiles');
    }

    /**
     * save a new profile
     * @param Request $request
     * @param ?int $id - id of the profile to edit
     * @return RedirectResponse - redirect to the profiles page
     */
    public function saveProfile(
        Request $request, 
        SaveProfileService $saveProfile,
        ?int $id =null): RedirectResponse
    {
        $datas = $request->all();

        $profile = Profile::findOrNew($id);

        if ($profile) {
            try {
                $profile = $saveProfile->editAndSaveProfile($datas, $profile);
            } catch (Exception $e) {
                dd($e);
            }
        }

        return redirect()->route('admin.show_profiles');
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
     * @param ?int $id - id of the profile to edit
     * @return View - display the form to edit a profile
     */
    public function editProfile(?int $id = null): View
    {
        $profile = Profile::find($id) ?? null;
        $skills = Skill::all();
        return view('admin.admin_profile_edit', ['profile' => $profile, 'skills' => $skills]);
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

        return redirect()->route('admin.show_profiles');
    }

    /**
     * update profile's experiences
     * @param int $id - profile's id
     * @param Request $request
     * @return RedirectResponse - redirection to edit page
     */
    public function saveProfileExperiences(
        int $id,
        Request $request,
        ProfileExperiences $profileExperiences
    ): RedirectResponse {
        $datas = $request->all();
        $profile = Profile::find($id);

        $profile = $profileExperiences->updateProfileExperiences($profile, $datas);

        return redirect()->route('admin.show_profiles');
    }
}
