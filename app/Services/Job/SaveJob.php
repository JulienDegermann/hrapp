<?php

namespace App\Services\Job;

use App\Models\Job;

final class SaveJob
{

    public function __construct(private readonly JobImageService $jobImage) {}

    /**
     * @param Job $job - job to edit and save to database 
     * @param array $formDatas - datas from form
     * @return Job - edited job saved to database
     */
    public function __invoke(Job $job, array $formDatas): Job
    {
        $fillables = [
            'title',
            'description',
            'location',
            'remuneration_min',
            'remuneration_max',
            'start_date',
            'published_at'
        ];

        $jobDatas = [];

        foreach ($formDatas as $key => $data) {
            if (in_array($key, $fillables)) {
                $jobDatas[$key] = $data;

                $job->$key = $data;
            }
        }
        
        if (isset($formDatas['delete_picture'])) {
            $job = $this->jobImage->deleteJobImage($job);
        }
        if (isset($formDatas['picture'])) {
            $job = $this->jobImage->replaceJobImage($job, $formDatas['picture']);
        }

        $job->save();

        return $job;
    }
}
