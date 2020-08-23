<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CepFormRequest;
use App\Services\AddressService;

class AddressController extends Controller
{

    public function show(CepFormRequest $request, AddressService $address)
    {
        return $address->findByCep($request->get('cep'));
    }
}
