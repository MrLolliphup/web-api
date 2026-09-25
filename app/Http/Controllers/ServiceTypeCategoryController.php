<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceTypeCategoryRequest;
use App\Http\Requests\UpdateServiceTypeCategoryRequest;
use App\Models\ServiceTypeCategory;

class ServiceTypeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceTypeCategories = ServiceTypeCategory::all();
        return response()->json($serviceTypeCategories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceTypeCategoryRequest $request)
    {
        $serviceTypeCategory = ServiceTypeCategory::create($request->validated());
        return response()->json($serviceTypeCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceTypeCategory $serviceTypeCategory)
    {
        return response()->json($serviceTypeCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceTypeCategory $serviceTypeCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceTypeCategoryRequest $request, ServiceTypeCategory $serviceTypeCategory)
    {
        $serviceTypeCategory->update($request->validated());
        return response()->json($serviceTypeCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceTypeCategory $serviceTypeCategory)
    {
        $serviceTypeCategory->delete();
        return response()->json(null, 204);
    }
}
