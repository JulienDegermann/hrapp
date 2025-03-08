<?php

namespace App\Services\Job;

use App\Models\Job;
use App\Models\Candidate;
use Illuminate\Http\UploadedFile;
use App\Services\Contact\SendApplyConfirmService;
use Illuminate\Support\Facades\Mail;

final class ApplyToJobService
{
    public function __construct(
        private readonly SendApplyConfirmService $confirmEmail,
        private readonly SaveResumeService $saveResume
    ) {}

    /**
     * Apply to a job
     * @param Jon $job - Job to apply
     * @param array $formDatas - form datas
     * @return Candidate - candidate who applied
     */
    public function apply(Job $job, array $formDatas): Candidate
    {
        $candidate = Candidate::firstOrNew(['email' => $formDatas['email']]);

        if ($job->candidates->contains($candidate)) {
            return $candidate;
        }

        $candidate->first_name = $formDatas['first_name'];
        $candidate->last_name = $formDatas['last_name'];
        $candidate->email = $formDatas['email'];
        $candidate->phone = $formDatas['phone'];
        $candidate->resume = $formDatas['resume'];

        // save resume
        if ($formDatas['resume'] instanceof UploadedFile) {
            $resume = $this->saveResume->save($formDatas['resume'], $candidate);
            $candidate->resume = $resume;
        }
        $candidate->save();
        $job->candidates()->attach($candidate);
        $job->save();

        // send confirmation email
        Mail::send(new SendApplyConfirmService($candidate, $job));

        return $candidate;
    }
}
