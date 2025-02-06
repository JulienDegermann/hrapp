<?php


namespace App\Services\Profile;

use App\Models\Experience;
use App\Services\ConvertImageService;
use Symfony\Component\HttpFoundation\File\UploadedFile;


final class ExperiencePicture
{
    private $path;

    public function __construct(
        private readonly ConvertImageService $imageConverter
    ) {
        $this->path = 'uploads/images/';
    }


    /**
     * delete experience image
     * @param Experience $experience - experience which request delete image
     * @return Experience
     */
    public function deleteExperienceImage(Experience $experience): Experience
    {
        if (file_exists($this->path . $experience->picture)) {
            if (unlink($this->path . $experience->picture)) {
                $experience->picture = null;
            };
        }

        return $experience;
    }

    /**
     * replace experience image from server
     * @param experience $experience - experience which request delete image
     * @param UploadedFile $file - file to upload and save
     * @return string - name of the file
     */
    public function replaceexperienceImage(UploadedFile $file, Experience $experience): string
    {
        if (isset($experience->picture)) {
            $this->deleteExperienceImage($experience);
        }
        
        $file_name = $this->imageConverter->convertToWebp($file, $this->path);

        return $file_name;
    }
}
