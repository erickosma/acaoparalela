<?php


namespace App\Services;


use App\Repositories\Contracts\SkillRepositoryInterface;
use App\SysOccupationArea;
use App\SysOccupationMacro;
use Illuminate\Support\Collection;

class SkillService
{
    private const OUTROS = 'Outros';

    /**
     * @var SkillRepositoryInterface
     */
    private $skillRepository;

    public function __construct(SkillRepositoryInterface $skill)
    {
        $this->skillRepository = $skill;
    }

    /**
     * @param null $idUser
     * @return Collection
     */
    public function occupations()
    {
        $macro = SysOccupationMacro::all();
        $allOccupation = SysOccupationArea::orderBy('id')->get();

        return $this->groupOccupation($macro, $allOccupation);
    }

    /**
     * @param $userId
     * @return Collection
     */
    public function occupationsAndSkills($userId){
        return $this->skillRepository->findAllSkillsByUser($userId)->get();
    }

    /**
     * @param $userId
     * @return Collection
     */
    public function user($userId){
        return $this->skillRepository->findAllSkillsByUser($userId)
            ->whereNotNull('user_id')
            ->get();
    }

    public function occupationUser($userId){
        $macro = SysOccupationMacro::all();
        $allOccupationAndSkills =  $this->occupationsAndSkills($userId);
        $occupationSelected = $allOccupationAndSkills->map(function ($item){
            $item->selected = !is_null($item->user_id);
            return $item;
        });

        return $this->groupOccupation($macro, $occupationSelected);
    }

    /**
     * Update skill
     *
     * @param array $values = [ "selected" => "true",
     *                           "id" => "3",
     *                           "text" => "One text"]
     * @param $userId
     */
    public function update(array $values, $userId)
    {
        if (!empty($values['id'])) {
            $newValues = [
                'user_id' => $userId,
                'sys_occupation_areas_id' => $values['id']
            ];
            $data = [
                'user_id' => $userId,
                'sys_occupation_areas_id' => $values['id']
            ];

            if ($values['selected'] === "true") {
                $this->skillRepository->updateOrCreate($data, $newValues);
            }
            else{
                $findSkill = $this->skillRepository->findOneBy($data);
                $this->skillRepository->delete($findSkill->id);
            }
        } else {
            //todo add sys manual
        }
    }

    /**
     * @param $macro
     * @param $allOccupation
     * @return mixed
     */
    private function groupOccupation($macro, $allOccupation)
    {
        $macroGroup = $macro->groupBy('id');
        return $allOccupation->groupBy('sys_macro_id')
            ->map(function ($item, $key) use ($macroGroup) {
                $item->macro = $macroGroup->get($key)->first()->name ?? self::OUTROS;
                return $item;
            });
    }

}
