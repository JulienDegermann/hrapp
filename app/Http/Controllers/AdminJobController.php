<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Services\Job\JobImageService;
use Illuminate\Http\Request;

use App\Services\Job\SaveJob;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class AdminJobController extends Controller
{
    /**
     * show saved jobs
     * @param ?int $id - id of the job if updating
     * @return View - view of saved jobs

     */
    public function showJobs(?int $id = null): View
    {
        $jobs = Job::all();

        return view('admin.admin_jobs', ['jobs' => $jobs]);
    }


    /**
     * edit job
     * @param ?int $id - id of the job if updating
     * @return View - view edit form
     */
    public function editJob(
        ?int $id = null
    ): View {

        $job = Job::find($id) ?? null;

        return view('admin.admin_job_edit', ['job' => $job]);
    }


    /**
     * save job to database
     * @param SaveJob $saveJob - service which save job to database
     * @param Request $request 
     * @param ?int $id - id of the job if updating
     * @return RedirectResponse - redirect to jobs list view
     */
    public function saveJob(
        SaveJob $saveJob,
        Request $request,
        ?int $id = null
    ): RedirectResponse {

        $datas = $request->all();

        $job = Job::findOrNew($id);
        $job = $saveJob($job, $datas);

        return redirect()->route('admin.show_jobs');
    }

    /**
     * remove job from database
     * @param ?int $id - id of the job if updating
     * @return RedirectResponse - redirect to jobs list view
     */
    public function deleteJob(
        SaveJob $saveJob,
        JobImageService $jobImage,
        int $id
    ): RedirectResponse {

        $job = Job::findOrFail($id);

        if ($job->image) {
            $job = $jobImage->deleteJobImage($job);
        }

        $job->delete();

        return redirect()->route('admin.show_jobs');
    }



    /**
     * show job's details and applicants
     * @param int $id - id of the job if updating
     * @return View - view of job with applicants
     */
    public function showApplicants(
        int $id
    ): View {
        $job = Job::findOrFail($id);

        return view('admin.admin_job_details', ['job' => $job]);
    }
}
