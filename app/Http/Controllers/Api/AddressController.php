<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressFormRequest;
use App\Http\Requests\CepFormRequest;
use App\Services\AddressService;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{

    /**
     * @var AddressService
     */
    private $address;

    public function __construct(AddressService $address)
    {
        $this->address = $address;
    }

    public function show(CepFormRequest $request)
    {
        return $this->address->findByCep($request->get('cep'));
    }

    public function store(AddressFormRequest $request)
    {
        $userId = auth()->user()->id;
        $data = $request->all();
        $data['cep'] = $data['cp-cep'];
        $return  = $this->address->save($userId, $data);

        return response()->json([
            'success' => $return,
        ], Response::HTTP_OK);
    }
}
