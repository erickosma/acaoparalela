<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\VoluntaryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class VoluntaryController extends Controller
{
    public function update(Request $request, $id, VoluntaryRepositoryInterface $voluntaryRepository)
    {
        $attribute = $request->only(['description', 'objective']);

        $request->validate([
            'description' => 'required|max:254'
        ]);

        $voluntary = $voluntaryRepository->findOrCreate(['user_id' => $id], $attribute);
        $voluntaryRepository->update($attribute, $voluntary->id);

        return response()->json([
            'success' => true,
        ], Response::HTTP_OK);
    }

    public function skill(){

    }
}
