<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\CategoryStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryApiResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryApiController extends Controller
{
    /**
     * Display the category tree.
     */
    public function index(): JsonResponse
    {
        $categories = Category::query()
            ->with('childCategory')
            ->whereNull('parent_id')
            ->where('status', CategoryStatus::Active->value)
            ->orderBy('name')
            ->get();

        return response()->json([
            'result' => true,
            'message' => 'categories list',
            'data' => CategoryApiResource::collection($categories),
        ]);
    }
}
