<?php

namespace App\Services\Profile;

use App\Models\Profile;
use App\Services\ConvertImageService;
use Symfony\Component\HttpFoundation\File\UploadedFile;


final class ProfileImageService
{

    private string $path;
    public function __construct(
        private readonly ConvertImageService $convertImage
    ) {
        $this->path = './uploads/images/';
    }
    /**
     * delete profile image
     * @param Profile $profile - profile which request delete image
     * @return Profile
     */
    public function deleteProfileImage(Profile $profile): Profile
    {
        if (file_exists($this->path . $profile->picture)) {
            if (unlink($this->path . $profile->picture)) {
                $profile->picture = null;
            };
        }

        return $profile;
    }

    /**
     * replace profile image from server
     * @param Profile $profile - profile which request delete image
     * @param UploadedFile $file - file to upload and save
     * @return Profile
     */
    public function replaceProfileImage(Profile $profile, UploadedFile $file): Profile
    {
        if (isset($profile->picture)) {
            $this->deleteProfileImage($profile);
        }

        $file_name = $this->convertImage->convertToWebp($file, $this->path);
        $profile->picture = $file_name;

        return $profile;
    }
}
