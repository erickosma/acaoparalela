<?php


namespace App\Repositories;


use App\Enums\UserType;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $model = User::class;

    /**
     * @param $id
     * @return int
     */
    public function userType($id){
        $collection =  $this->model->select('voluntaries.user_id as voluntary','ongs.user_id as ong' )
            ->leftJoin('voluntaries', 'users.id', '=', 'voluntaries.user_id')
            ->leftJoin('ongs', 'users.id', '=', 'ongs.user_id')
            ->where('users.id', '=', $id)
            ->get();

        if($collection->count() > 0){
            $completeRegistration = $collection->first();
            if($completeRegistration->voluntary){
                return  UserType::VOLUNTARY;
            }
            else if($completeRegistration->ong){
                return  UserType::ONG;
            }
        }
        return 0;
    }
}
