<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SkillService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillController extends Controller
{
    public function update(Request $request, SkillService $skill)
    {
        $userId = auth()->user()->id;
        $input = $request->all();
        $skill->update($input, $userId);


        return response()->json([
            'success' => true,
        ], Response::HTTP_OK);

    }
}
