<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function update(Request $request, $userId, UserRepositoryInterface $userRepository)
    {
        $name = $request->only('name');

        $request->validate([
            'name' => 'required|max:254']);

        $userRepository->update($name, $userId);

        return response()->json([
            'success' => true,
        ], Response::HTTP_OK);

    }
}
