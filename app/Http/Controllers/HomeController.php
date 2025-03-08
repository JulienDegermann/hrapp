<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Profile;
use App\Services\Contact\FileService\VcardService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\RedirectResponse;
use App\Services\Contact\SendEmailService;
use App\Services\Contact\SendEmailToProfileService;
use App\Services\Job\ApplyToJobService;

final class HomeController
{
    public function index(): View
    {
        $profile = Profile::where('email', 'degermann.julien@gmail.com')->first();
        $profiles = Profile::all();
        $jobs = Job::all();
        return view('home', ['default_profile' => $profile, "profiles" => $profiles, 'jobs' => $jobs]);
    }

    /**
     * show page with profile's details
     * @param int $id - id of profile to show
     * @return View - view with profile details
     */
    public function showProfile(int $id): View
    {
        $profile = Profile::findOrFail($id);
        return view('show_profile', ['profile' => $profile]);
    }

    /**
     * show page with job's details
     * @param int $id - id of Job to show
     * @return View - view with job details
     */
    public function showJob(int $id): View
    {
        $job = Job::findOrFail($id);
        return view('show_job', ['job' => $job]);
    }

    /**
     * show page with job's details
     * @param ?int $id - id of Job to apply (nullable)
     * @param Request $request - request
     * @param ApplyJobService $applyJobService - service to apply to job
     * @return View - view with apply form
     */
    public function applyForJob(
        Request $request,
        ApplyToJobService $applyToJobService,
        ?int $id = null,
    ): View {
        $job = Job::findOrFail($id) ?? null;

        $datas = $request->all();

        if ($datas) {
            $apply = $applyToJobService->apply($job, $datas);
        }

        return view('apply_job', ['job' => $job]);
    }


    /**
     * show page with contact form
     * @param int $id - id of Profile to contact
     * @return View - view with contact form
     */
    public function showContact(?int $id = null): View
    {
        $profile = Profile::find($id) ?? null;

        return view('show_contact', ['profile' => $profile]);
    }


    /**
     * show page with contact form
     * @param int $id - id of Profile to contact
     * @return View - view with contact form
     */
    public function sendContact(
        Mailer $mailer,
        Request $request,
        VcardService $vCard,
        ?int $id = null,
    ): RedirectResponse {

        $datas = $request->all();
        $profile = Profile::find($id) ?? null;

        if ($profile) {
            $file = $vCard->createVcard($datas);

            $mail = new SendEmailToProfileService($profile, $datas);
            $mail->attach($file);
            if ($mail->send($mailer)) {
                $vCard->deleteVcard();
            };
        } else {
            $mail = new SendEmailService($datas);
            $mail->send($mailer);
        }


        return redirect()->route('home');
    }
}
