<?php


namespace App\Repositories;

use App\Repositories\Contracts\VoluntaryRepositoryInterface;
use App\Skill;

class SkillRepository extends BaseRepository implements VoluntaryRepositoryInterface
{
    protected $model = Skill::class;
}
