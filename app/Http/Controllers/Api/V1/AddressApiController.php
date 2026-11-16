<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequests\StoreAddressApiRequest;
use App\Http\Requests\ApiRequests\UpdateAddressApiRequest;
use App\Http\Resources\AddressApiResource;
use App\Models\Address;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressApiController extends Controller
{
    /**
     * Display the authenticated user's addresses.
     */
    public function index(Request $request): JsonResponse
    {
        $addresses = $request->user()
            ->addresses()
            ->with(['province', 'city'])
            ->latest()
            ->get();

        return response()->json([
            'result' => true,
            'message' => 'addresses list',
            'data' => AddressApiResource::collection($addresses),
        ]);
    }

    /**
     * Store a newly created address.
     */
    public function store(StoreAddressApiRequest $request): JsonResponse
    {
        $address = Address::query()->create([
            'user_id' => $request->user()->id,
            'province_id' => $request->input('province_id'),
            'city_id' => $request->input('city_id'),
            'name' => $request->input('name') ?? $request->user()->name,
            'mobile' => $request->input('mobile') ?? $request->user()->mobile,
            'address' => $request->input('address'),
        ]);

        $address->load(['province', 'city']);

        return response()->json([
            'result' => true,
            'message' => 'address created',
            'data' => new AddressApiResource($address),
        ], 201);
    }

    /**
     * Display the specified address.
     */
    public function show(Request $request, Address $address): JsonResponse
    {
        $this->ensureOwnership($request, $address);

        $address->load(['province', 'city']);

        return response()->json([
            'result' => true,
            'message' => 'address found',
            'data' => new AddressApiResource($address),
        ]);
    }

    /**
     * Update the specified address.
     */
    public function update(UpdateAddressApiRequest $request, Address $address): JsonResponse
    {
        $this->ensureOwnership($request, $address);

        $address->update($request->only(['province_id', 'city_id', 'name', 'mobile', 'address']));
        $address->load(['province', 'city']);

        return response()->json([
            'result' => true,
            'message' => 'address updated',
            'data' => new AddressApiResource($address),
        ]);
    }

    /**
     * Remove the specified address.
     */
    public function destroy(Request $request, Address $address): JsonResponse
    {
        $this->ensureOwnership($request, $address);

        $address->delete();

        return response()->json([
            'result' => true,
            'message' => 'address deleted',
            'data' => [],
        ]);
    }

    private function ensureOwnership(Request $request, Address $address): void
    {
        abort_if($address->user_id !== $request->user()->id, 404);
    }
}
