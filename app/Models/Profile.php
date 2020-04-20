<?php


namespace App\Models;


use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class Profile
{
    /**
     * @var $user UserRepositoryInterface
     */
    private $userRepository;

    protected $bgColors = ['bg-primary-ac', 'bg-success', 'bg-secundary-ac', 'bg-profile-ac'];

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return mixed
     */
    public function userType($id)
    {
        return Cache::remember('userType', 360, function ()  use ($id){
            return $this->userRepository->userType($id);
        });
    }

    public function bgColor(){
        return $this->bgColors[array_rand($this->bgColors)];
    }


    /**
     * @return UserRepositoryInterface
     */
    public function getUserRepository(): UserRepositoryInterface
    {
        return $this->userRepository;
    }
}

