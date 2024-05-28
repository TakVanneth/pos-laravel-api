<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Models\Sales;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::with('user')->get();
        return SaleResource::collection($sales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalesRequest $request)
    {
        $sale = Sales::create($request->validated());
        $sale->load('user');
        return response()->json([
            'success' => true,
            'data' => SaleResource::make($sale),
            'message' => 'Sale created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sale)
    {
        $sale->load('user');
        return SaleResource::make($sale);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalesRequest $request, Sales $sale)
    {
        $sale->update($request->validated());
        $sale->load('user');
        return response()->json([
            'success' => true,
            'data' => SaleResource::make($sale),
            'message' => 'Sale updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sale)
    {
        $sale->delete();
        return response()->noContent();
    }
}
