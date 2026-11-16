<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductApiResource;
use App\Http\Resources\ProductListApiResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a filtered, paginated listing of active products.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Product::query()
            ->with(['category.parentCategory', 'brand'])
            ->where('status', ProductStatus::Active->value);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('e_name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        foreach (['category_id', 'brand_id', 'color_id', 'guaranty_id'] as $filter) {
            if ($request->filled($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }

        match ($request->input('sort', 'newest')) {
            'cheapest' => $query->orderBy('price'),
            'most_expensive' => $query->orderByDesc('price'),
            'bestseller' => $query->orderByDesc('sold'),
            'most_viewed' => $query->orderByDesc('viewed'),
            default => $query->orderByDesc('created_at'),
        };

        $perPage = (int) $request->input('per_page', 15);
        $perPage = $perPage > 0 ? min($perPage, 50) : 15;

        $products = $query->paginate($perPage)->appends($request->query());

        return response()->json([
            'result' => true,
            'message' => 'products list',
            'data' => new ProductListApiResource($products),
        ]);
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product): JsonResponse
    {
        $product->load([
            'category.parentCategory',
            'brand',
            'colors',
            'guaranties',
            'productProperties.categoryAttribute',
            'galleries',
            'productPrices.color',
            'productPrices.guaranty',
        ]);

        return response()->json([
            'result' => true,
            'message' => 'product found',
            'data' => new ProductApiResource($product),
        ]);
    }
}
