<?php


namespace App\Repositories\Contracts;


interface SkillRepositoryInterface extends RepositoryInterface
{
    public function findAllSkillsByUser($userId);
}
