<?php

namespace App\Services\Job;

use App\Models\Job;
use Illuminate\Http\UploadedFile;
use App\Services\ConvertImageService;

final class JobImageService
{
    private $path;

    public function __construct(private readonly ConvertImageService $converter)
    {
        $this->path = 'uploads/images/';
    }

    /**
     * delete Job image
     * @param Job $job - Job which request delete image
     * @return Job
     */
    public function deleteJobImage(Job $job): Job
    {
        if (file_exists($this->path . $job->picture)) {
            if (unlink($this->path . $job->picture)) {
                $job->picture = null;
            };
        }

        return $job;
    }

    /**
     * replace Job image from server
     * @param Job $job - Job which request delete image
     * @param UploadedFile $file - file to upload and save
     * @return Job
     */
    public function replaceJobImage(Job $job, UploadedFile $file): Job
    {
        if (isset($Job->picture)) {
            $this->deleteJobImage($Job);
        }

        $file_name = $this->converter->convertToWebp($file, $this->path);
        $job->picture = $file_name;

        return $job;
    }
}
