<?php

namespace App\Repositories;

use App\Models\UserSkill;

class UserSkillRepository
{
    public function all($userId)
    {
        return UserSkill::where('user_id', $userId)->orderBy('id', 'DESC')->get();
    }

    public function find($id)
    {
        return UserSkill::find($id);
    }

    public function create(array $data)
    {
        return UserSkill::create($data);
    }

    public function update(UserSkill $skill, array $data)
    {
        $skill->update($data);
        return $skill;
    }

    public function delete(UserSkill $skill)
    {
        return $skill->delete();
    }
}
