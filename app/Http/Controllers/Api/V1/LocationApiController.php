<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityApiResource;
use App\Http\Resources\ProvinceApiResource;
use App\Models\Province;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationApiController extends Controller
{
    /**
     * Display a listing of provinces.
     */
    public function provinces(Request $request): JsonResponse
    {
        $query = Province::query();

        if ($request->boolean('with_cities')) {
            $query->with(['cities' => fn ($query) => $query->orderBy('name')]);
        }

        return response()->json([
            'result' => true,
            'message' => 'provinces list',
            'data' => ProvinceApiResource::collection($query->orderBy('name')->get()),
        ]);
    }

    /**
     * Display the cities of the given province.
     */
    public function cities(Province $province): JsonResponse
    {
        $cities = $province->cities()->orderBy('name')->get();

        return response()->json([
            'result' => true,
            'message' => 'cities list',
            'data' => CityApiResource::collection($cities),
        ]);
    }
}
