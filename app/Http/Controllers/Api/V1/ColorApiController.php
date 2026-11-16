<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ColorApiResource;
use App\Models\Color;
use Illuminate\Http\JsonResponse;

class ColorApiController extends Controller
{
    /**
     * Display a listing of colors.
     */
    public function index(): JsonResponse
    {
        $colors = Color::query()->orderBy('name')->get();

        return response()->json([
            'result' => true,
            'message' => 'colors list',
            'data' => ColorApiResource::collection($colors),
        ]);
    }
}
