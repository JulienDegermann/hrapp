<?php

namespace App\Services\Profile;

use App\Models\Profile;
use App\Services\Profile\ProfileImageService;

final class SaveProfileService
{
    public function __construct(
        private readonly ProfileImageService $profileImageService
    ) {}

    /**
     * save profile to database
     * @param array $formDatas - datas from a form
     * @param Profile $profile - profile to edit and save
     * return Profile - the edited profile
     */
    public function editAndSaveProfile(array $formDatas, Profile $profile): Profile
    {
        if (isset($datas['delete_img']) && isset($profile->picture)) {
            $profile = $this->profileImageService->deleteProfileImage($profile);
        }

        if (isset($formDatas['picture'])) {
            $profile = $this->profileImageService->replaceProfileImage($profile, $formDatas['picture']);
        }

        $profile->first_name = $formDatas['first_name'] ?? null;
        $profile->last_name = $formDatas['last_name'] ?? null;
        $profile->email = $formDatas['email'] ?? null;
        $profile->phone = $datas['phone'] ?? null;
        $profile->resume = $formDatas['resume'] ?? null;
        $profile->github = $formDatas['github'] ?? null;
        $profile->linkedin = $formDatas['linkedin'] ?? null;

        $profile->save();

        return $profile;
    }
}
