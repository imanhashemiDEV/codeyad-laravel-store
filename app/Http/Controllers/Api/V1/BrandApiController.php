<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\BrandStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandApiResource;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;

class BrandApiController extends Controller
{
    /**
     * Display a listing of active brands.
     */
    public function index(): JsonResponse
    {
        $brands = Brand::query()
            ->where('status', BrandStatus::Active->value)
            ->orderBy('name')
            ->get();

        return response()->json([
            'result' => true,
            'message' => 'brands list',
            'data' => BrandApiResource::collection($brands),
        ]);
    }
}
