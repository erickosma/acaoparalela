<?php

namespace Tests\Integration\Services;

use App\Repositories\SkillRepository;
use App\Services\SkillService;
use App\Skill;
use App\User;
use Tests\IntegrationTestCase;

class SkillTest extends IntegrationTestCase
{

    /**
     * @var SkillService
     */
    private $skill;

    /**
     * @var SkillRepository
     */
    private $skillRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->skillRepository = new SkillRepository();
        $this->skill = new  SkillService($this->skillRepository);
    }

    public function testOccupationsShouldReturnCollection()
    {
        $occupations = $this->skill->occupations();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $occupations);
        $this->assertGreaterThan(1, $occupations->count());
        $this->assertStringContainsStringIgnoringCase("Administração, negócios e serviços", $occupations->first()->macro);
    }

    public function testUserOccupationsShouldReturnCollection()
    {
        $user = factory(User::class)->create();
        factory(Skill::class)->create(['user_id' => $user->id]);

        $occupations = $this->skill->occupationUser($user->id);
        $selected =  $this->findSelected($occupations);
        $this->assertNotNull($selected);
        $this->assertEquals($user->id, $selected->user_id);
    }

    public function testUserSkillShouldReturnCollection()
    {
        $user = factory(User::class)->create();
        $randonSkill = factory(Skill::class)->create(['user_id' => $user->id]);

        $skill = $this->skill->user($user->id)
            ->first();

        $this->assertNotNull($skill);
        $this->assertEquals($user->id, $skill->user_id);
        $this->assertEquals($randonSkill->sys_occupation_areas_id, $skill->sys_occupation_areas_id);
    }

    public function testUpdateShouldUpdateUserSkill()
    {
        $user = factory(User::class)->create();
        $occupation = $this->skill->occupations()
            ->first() //get eloquent
            ->first(); //get item

        $dataOccupation = [
            "selected" => "true",
            "id" => $occupation->id,
            "text" => $occupation->name
        ];
        $findBy = [
            'sys_occupation_areas_id' => $occupation->id,
            'user_id' => $user->id
        ];

        $this->skill->update($dataOccupation, $user->id);
        $findSkill = $this->skillRepository->findOneBy($findBy);

        $this->assertDatabaseHas('skills', $findBy);
        $this->assertEquals($occupation->id, $findSkill->sys_occupation_areas_id);
        $this->assertEquals($user->id, $findSkill->user_id);
    }

    public function testRemoveSkillShouldUpdateUserSkill()
    {
        $user = factory(User::class)->create();
        $occupation = $this->skill->occupations()
            ->first() //get eloquent
            ->first(); //get item

        $dataOccupation = [
            "selected" => "true",
            "id" => $occupation->id,
            "text" => $occupation->name
        ];

        $findBy = [
            'sys_occupation_areas_id' => $occupation->id,
            'user_id' => $user->id
        ];

        $this->skill->update($dataOccupation, $user->id);
        $findSkill = $this->skillRepository->findOneBy($findBy);

        $dataOccupation["selected"] ="false";
        $this->skill->update($dataOccupation, $user->id);
        $findSkillMiss = $this->skillRepository->findOneBy($findBy);

        $this->assertDatabaseMissing('skills', $findBy);
        $this->assertNull($findSkillMiss);
    }

    /**
     * @param $occupations
     * @return Skill|null
     */
    private function findSelected($occupations)
    {
        foreach ($occupations as $item) {
            foreach ($item as $c) {
                if ($c->selected) {
                    return $c;
                }
            }
        }
        return null;
    }
}

