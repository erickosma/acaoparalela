<?php


namespace App\Services;


use App\Services\Client\Postmon;

class AddressService
{
    private $postmon;

    public function __construct()
    {
        $this->postmon = new Postmon();
    }

    public function findByCep($cep){
        $adResponse = $this->postmon->getAddresses($cep);
        if($adResponse->successful()){
            return $adResponse;
        }

        return abort(404, trans('response.404'));
    }


    private function save(){
        //  salvar endereço em tabela
    }
}
