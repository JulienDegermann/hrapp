<?php

namespace App\Services\Skill;

use App\Models\Skill;


final class SaveSkill
{
    public function __construct() {}


    /**
     * create or edit a Skill instance and save to database
     * @param Skill $skill - skill to create or update
     * @param Skill $skill - skill to create or update
     * @return Skill - saved skill
     */
    public function __invoke(Skill $skill, array $datas): Skill
    {

        $skill->title = $datas['title'];
        $skill->version = $datas['version'] ?? null;
        
        $skill->save();

        return $skill;
    }
}
