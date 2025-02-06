<?php

namespace App\Services\Profile;

use App\Models\Profile;
use App\Models\Experience;
use InvalidArgumentException;
use App\Services\ConvertImageService;

final class ProfileExperiences
{
    public function __construct(
        private readonly ConvertImageService $imageConverter
    ) {}

    /**
     * create experiences, link to a defined profile and save do database
     * @param Profile $profile - profile to edit and link to experiences
     * @param array $datas - datas containing experiences
     * @return Profile - edited profile with added experiences
     */
    public function updateProfileExperiences(Profile $profile, array $datas): Profile
    {
        if (!$datas['experiences']) {
            throw new InvalidArgumentException('Données invalides');
        }
        $experiencesToDelete = [];

        foreach ($datas['experiences'] as $experience) {

            if (isset($experience['delete']) && $experience['delete'] === 'on') {
                foreach ($profile->experiences as $profileExp) {

                    if ($profileExp->id == $experience['id']) {
                        $experiencesToDelete[] = $profileExp->id;
                    }
                }
            } else {
                $profile->experiences()->updateOrCreate(
                    ['id' => $experience['id'] ?? null],
                    [
                        'title' => $experience['title'] ?? null,
                        'description' => $experience['description'] ?? null
                    ]
                );
            }
        }

        $profile->experiences()->whereIn('id', $experiencesToDelete)->delete();

        return $profile;
    }
}
