<?php


namespace App\Repositories;

use App\Repositories\Contracts\SkillRepositoryInterface;
use App\Skill;
use App\SysOccupationArea;
use Illuminate\Support\Facades\DB;

class SkillRepository extends BaseRepository implements SkillRepositoryInterface
{
    protected $model = Skill::class;

    /**
     * @param $userId
     * @return mixed
     */
    public function findAllSkillsByUser($userId){
        return SysOccupationArea::select('sys_occupation_areas.id', 'sys_occupation_areas.name',
            'sys_occupation_areas.sys_macro_id', 'skills.user_id', 'skills.sys_occupation_areas_id', 'skills.manual')
            ->leftJoin('skills', function ($join) use ($userId) {
                $join->on('skills.sys_occupation_areas_id', '=', 'sys_occupation_areas.id')
                    ->on('skills.user_id', '=', DB::raw($userId));
            });
    }
}
