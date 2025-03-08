<?php

namespace App\Services\Job;

use App\Models\Candidate;
use Illuminate\Http\UploadedFile;

final class SaveResumeService {
    private string $path;

    public function __construct() {
        $this->path = 'uploads/resumes/';
    }

    /**
     * Save resume
     * @param UploadedFile $resume - resume to save
     * @param Candidate $canditate - canditate who upload resume
     * @return string - path to resume
     */
    public function save(UploadedFile $resume, Candidate $candidate): string
    {
        $fileName = $candidate->first_name . '_' . $candidate->last_name . '_' . $resume->getClientOriginalName();
        $resume->move($this->path, $fileName);
        return $fileName;
    }
}