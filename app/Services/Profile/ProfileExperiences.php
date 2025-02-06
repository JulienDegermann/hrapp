<?php

namespace App\Services\Profile;

use App\Models\Profile;
use App\Models\Experience;
use InvalidArgumentException;
use App\Services\ConvertImageService;
use Mockery\Undefined;

final class ProfileExperiences
{
    public function __construct(
        private readonly ExperiencePicture $experiencePicture,
    ) {}

    /**
     * create experiences, link to a defined profile and save do database
     * @param Profile $profile - profile to edit and link to experiences
     * @param array $datas - datas containing experiences
     * @return Profile - edited profile with added experiences
     */
    public function updateProfileExperiences(
        Profile $profile,
        array $datas
    ): Profile {
        if (!$datas['experiences']) {
            throw new InvalidArgumentException('Données invalides');
        }

        $experiencesToDelete = [];
        $experiencesToUpdate = [];
        $experiencesToCreate = [];

        $fillables = [
            'title',
            'description',
            'github',
            'url',
            'picture'
        ];

        foreach ($datas['experiences'] as $experience) {

            // format datas
            $datas = [];
            foreach ($fillables as $fillable) {
                foreach ($experience as $key => $value) {
                    if ($key === $fillable) {
                        $datas[$key] = $value;
                    }
                }
            }

            $exp = isset($experience['id']) ? $profile->experiences->where('id', $experience['id'])->first() : new Experience;

            if (isset($experience['delete']) && $experience['delete'] === 'on') {
                if (isset($exp->picture)) {
                    $this->experiencePicture->deleteExperienceImage($exp);
                }
                $experiencesToDelete[] = $exp->id;
            }


            if (isset($experience['picture'])) {
                $file_name = $this->experiencePicture->replaceExperienceImage($experience['picture'], $exp);
                $datas['picture'] = $file_name;
            } else {
                $datas['picture'] = null;
            }

            if (isset($experience['id'])) {
                $datas['id'] =  $experience['id'];

                // remove image
                if (isset($experience['delete_picture'])) {
                    $this->experiencePicture->deleteExperienceImage($exp);
                }
                $experiencesToUpdate[] = $datas;
            } else {
                $experiencesToCreate[] = $datas;
            }
        }

        // update and create
        $profile->experiences()->upsert($experiencesToUpdate, uniqueBy: ['id'], update: $fillables);
        $profile->experiences()->createMany($experiencesToCreate);

        // delete
        $profile->experiences()->whereIn('id', $experiencesToDelete)->delete();

        return $profile;
    }
}
