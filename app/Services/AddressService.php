<?php


namespace App\Services;


use App\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\VoluntaryRepositoryInterface;
use App\Services\Client\Postmon;
use Illuminate\Support\Str;

class AddressService
{
    private $postmon;

    /**
     * @var AddressRepositoryInterface
     */
    private $address;
    /**
     * @var VoluntaryRepositoryInterface
     */
    private $voluntary;
    /**
     * @var CityRepositoryInterface
     */
    private $city;

    public function __construct(AddressRepositoryInterface  $addressRepository,
                                VoluntaryRepositoryInterface  $voluntary,
                                CityRepositoryInterface $city)
    {
        $this->postmon = new Postmon();
        $this->address = $addressRepository;
        $this->voluntary = $voluntary;
        $this->city = $city;
    }

    public function findByCep($cep){
        $adResponse = $this->postmon->getAddresses($cep);
        if($adResponse->successful()){
            return $adResponse;
        }

        return abort(404, trans('response.404'));
    }

    public function save($userId, array $data){
        $voluntary = $this->voluntary->findOneBy(['user_id' => $userId]);

        $data = $this->fillCity($data);

        $address = new Address($data);
        $voluntary->address()
            ->save($address);

        return true;
    }

    /**
     * @param array $data
     * @return array
     */
    private function fillCity(array $data): array
    {
        $foundCity = $this->city->findBySlug(Str::slug($data['city']));

        if(!empty($foundCity)){
            $data['city_id'] = $foundCity->id;
            $data['country_id'] = 1;
            $data['latitude'] = $foundCity->lat;
            $data['longitude'] = $foundCity->long;
        }
        return $data;
    }
}
