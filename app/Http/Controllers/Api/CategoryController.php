<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return response()->json([
            'success' => true,
            'data' => new CategoryResource($category),
            'message' => 'Category Created Successfully'
        ], 201);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json([
            'success' => true,
            'data' => new CategoryResource($category),
            'message' => 'Category Updated Successfully'
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent();
    }
}
