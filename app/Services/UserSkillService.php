<?php

namespace App\Services;

use App\Repositories\UserSkillRepository;
use App\Models\UserSkill;

class UserSkillService
{
    protected $repo;

    public function __construct(UserSkillRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list($userId)
    {
        return $this->repo->all($userId);
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
    }

    public function update(UserSkill $skill, array $data)
    {
        return $this->repo->update($skill, $data);
    }

    public function delete(UserSkill $skill)
    {
        return $this->repo->delete($skill);
    }
    public function find($id)
    {
        return $this->repo->find($id);
    }
}
