<?php


namespace App\Models;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\VoluntaryRepositoryInterface;

class ProfileVoluntary extends Profile
{

    /**
     * @var VoluntaryRepositoryInterface
     */
    private $voluntaryRepository;

    public function __construct(UserRepositoryInterface $userRepository, VoluntaryRepositoryInterface $voluntaryRepository)
    {
        parent::__construct($userRepository);
        $this->voluntaryRepository = $voluntaryRepository;
    }

    /**
     * @return VoluntaryRepositoryInterface
     */
    public function getVoluntaryRepository(): VoluntaryRepositoryInterface
    {
        return $this->voluntaryRepository;
    }

}
