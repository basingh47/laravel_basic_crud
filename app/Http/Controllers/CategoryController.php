<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryData = Category::paginate(3);
        return view("admin.pages.categories.categories-list", compact('categoryData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.categories.create-categories");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $request->validated();
        //    dd($category);
        Category::create(['category_name' => $category['categoryName']]);
        return redirect()->route("categories.create")->with("message", "Category add");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view("admin.pages.categories.edit-categories", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $categoryData = $request->validated();
        // dd($categoryData);
        $category->category_name=$categoryData['categoryName'];
        $category->save();
        return redirect()->route("categories.index")->with("message", "Update");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // dd($category->toArray());
        $category->delete();
        return redirect()->route("categories.index")->with("message", "Category Delete");
    }
}
