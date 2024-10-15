<?php

namespace App\Http\Controllers\Admin;

use App\Models\RegionCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegionCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Category;
class RegionCategoryController extends Controller
{
    public function index() : View
    {
        $region_categories = RegionCategory::get();
        return view('admin.region_categories.index', compact('region_categories'));
    }

    public function create() : View
    {
        $categories = Category::get();
        return view('admin.region_categories.create', compact('categories'));
    }

    public function store(StoreRegionCategoryRequest $request) : RedirectResponse
    {
        RegionCategory::create($request->validated());

        return redirect()->route('admin.region_categories.index')->with('message', 'Thêm danh mục thành công!');
    }

    public function edit(RegionCategory $region_category) : View
    {
        $categories = Category::get();

        return view('admin.region_categories.edit', compact('categories','region_category'));
    }

    public function update(StoreRegionCategoryRequest $request,RegionCategory $region_category) : RedirectResponse
    {
        $region_category->update($request->validated());

        return redirect()->route('admin.region_categories.index')->with('message', 'Cập nhật danh mục thành công!');
    }

    public function destroy(RegionCategory $region_category) : RedirectResponse
    {
        $region_category->delete();

        return redirect()->route('admin.region_categories.index')->with('message', 'Xóa danh mục thành công!');
    }
}
