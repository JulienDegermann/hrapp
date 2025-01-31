<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mockery\Undefined;

class AdminController extends Controller
{
    /**
     * Display the admin page
     * @return View
     */
    public function index(): View
    {
        $profiles = Profile::All();

        return view('admin.admin', ['profiles' => $profiles]);
    }



    /**
     * Display all profiles
     * @return View - display all profiles
     */
    public function showProfiles(): View
    {
        $profiles = Profile::All();

        return view('admin/admin_profiles', ['profiles' => $profiles]);
    }


    /**
     * Display the details of a profile
     * @param int $id - id of the profile to show
     * @return View - display the profile
     */
    public function showProfile(int $id): View
    {
        $profile = Profile::find($id);

        return view('admin/admin_profile_show', ['profile' => $profile]);
    }


    /**
     * Display the form to create a profile
     * @param int $id - id of the profile to delete
     * @return View - display the form to create a profile
     */
    public function deleteProfile(int $id): RedirectResponse
    {
        $profile = Profile::find($id);
        $profile->delete();
        return redirect()->route('admin.profiles');
    }

    /**
     * save a new profile
     * @param Request $request
     * @return RedirectResponse - redirect to the profiles page
     */
    public function saveProfile(Request $request): RedirectResponse
    {
        $datas = $request->all();
        try {
            $profile = new Profile();
            $profile->email = $datas['email'];
            $profile->first_name = $datas['first_name'];
            $profile->last_name = $datas['last_name'];
            $profile->phone = $datas['phone'];
            $profile->linkedin = $datas['linkedin'];
            $profile->github = $datas['github'];
            $profile->resume = $datas['resume'];
            $profile->date_of_birth = $datas['date_of_birth'];

            $profile->save();
        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->route('admin.profiles');
    }

    /**
     * create a new profile
     * @return View - display the form to create a profile
     */
    public function createProfile(): View
    {
        return view('admin.admin_profile_edit');
    }

    /**
     * edit a profile
     * @param int $id - id of the profile to edit
     * @return View - display the form to edit a profile
     */
    public function editProfile(int $id): View
    {
        $profile = Profile::find($id);
        return view('admin.admin_profile_edit', ['profile' => $profile]);
    }


    /**
     * save an edited profile
     * @param int $id - id of the edited profile
     * @param Request $request
     * @return RedirectResponse - redirection to list
     */
    public function updateProfile(int $id, Request $request) {
        
        $datas = $request->all();

        $profile = Profile::find($id);
        $profile->first_name = $datas['first_name'];
        $profile->last_name = $datas['last_name'];
        $profile->email = $datas['email'];
        $profile->phone = $datas['phone'];
        $profile->resume = $datas['resume'];
        $profile->github = $datas['github'];
        $profile->linkedin = $datas['linkedin'];
        $profile->save();

        return redirect()->route('admin.profiles');
    }
}
