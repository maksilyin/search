<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $query = $request->query();

        if (empty($query)) {
            return response()->json(["error" => 'query is empty'], 400);
        }

        $validatedData = Validator::make($query, [
            'name' => 'min:1',
            'price_from' => 'integer',
            'price_to' => 'integer',
            'bedrooms' => 'integer',
            'bathrooms' => 'integer',
            'storeys' => 'integer',
            'garages' => 'integer',
        ]);

        if ($validatedData->fails()) {
            return response()->json(["error" => $validatedData->errors()->all()], 400);
        }

        $oHouse = House::query();

        if (isset($query['name']) && !empty($query['name'])) {
            $oHouse->where('name', 'LIKE', "%{$query['name']}%");
        }
        if (isset($query['price_from']) || isset($query['price_to'])) {
            $arBetween = [];
            $arBetween[] = $query['price_from'] ?? 0;
            $arBetween[] = $query['price_to'] ?? PHP_INT_MAX;
            $oHouse->whereBetween('price', $arBetween);
        }
        if (isset($query['bedrooms'])) {
            $oHouse->where('bedrooms', '=', $query['bedrooms']);
        }
        if (isset($query['bathrooms'])) {
            $oHouse->where('bathrooms', '=', $query['bathrooms']);
        }
        if (isset($query['storeys'])) {
            $oHouse->where('storeys', '=', $query['storeys']);
        }
        if (isset($query['garages'])) {
            $oHouse->where('garages', '=', $query['garages']);
        }

        $arHouses = $oHouse->get();

        return response()->json($arHouses);
    }
}
