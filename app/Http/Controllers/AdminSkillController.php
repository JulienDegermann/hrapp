<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\View\View;

use Illuminate\Http\Request;
use App\Services\Skill\SaveSkill;
use Illuminate\Http\RedirectResponse;

final class AdminSkillController extends Controller
{

    /**
     * page showing existing skills
     * @param int $id - id of skill to update
     * @return View
     */
    public function showSkills(?int $id = null): View
    {
        $skills = Skill::all();
        $skill = $id ? Skill::find($id) : null;
        return view('admin.admin_skills', ['skills' => $skills, "skill" => $skill]);
    }


    /**
     * save to database a new or updated skill
     * @param SaveSkill $saveSkill - service which save to DB
     * @param Request $request - request with datas
     * @param int $id - id of skill to update
     * @return RedirectResponse - redirection
     */
    public function saveSkill(
        SaveSkill $saveSkill,
        Request $request,
        ?int $id = null,
    ): RedirectResponse {

        $datas = $request->all();
        $skill = Skill::findOrNew($id);
        // dd($skill);
        $skill = $saveSkill($skill, $datas);

        $request->session()->forget('_old_input');
        $request->replace([]);
        $request->session()->flush();

        return redirect()->route('admin.show_skills');
    }

    /**
     * page showing existing skills
     * @param int $id - id of skill to be deleted
     * @return RedirectResponse
     */
    public function deleteSkill(int $id): RedirectResponse
    {

        Skill::findOrFail($id)->delete();
        

        return redirect()->route('admin.show_skills');
    }
}
