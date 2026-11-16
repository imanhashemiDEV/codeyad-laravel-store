<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuarantyApiResource;
use App\Models\Guaranty;
use Illuminate\Http\JsonResponse;

class GuarantyApiController extends Controller
{
    /**
     * Display a listing of guaranties.
     */
    public function index(): JsonResponse
    {
        $guaranties = Guaranty::query()->orderBy('name')->get();

        return response()->json([
            'result' => true,
            'message' => 'guaranties list',
            'data' => GuarantyApiResource::collection($guaranties),
        ]);
    }
}
