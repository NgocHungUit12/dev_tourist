<?php

namespace App\Http\Controllers\Admin;

use App\Models\RegionCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProvineCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\ProvineCategory;

class ProvineCategoryController extends Controller
{
    public function index() : View
    {
        $provine_categories = ProvineCategory::get();
        return view('admin.provine_categories.index', compact('provine_categories'));
    }

    public function create() : View
    {
        $region_categories = RegionCategory::get();
        return view('admin.provine_categories.create', compact('region_categories'));
    }

    public function store(StoreProvineCategoryRequest $request) : RedirectResponse
    {
        ProvineCategory::create($request->validated());

        return redirect()->route('admin.provine_categories.index')->with('message', 'Thêm danh mục thành công!');
    }

    public function edit(ProvineCategory $provine_category) : View
    {
        $region_categories = RegionCategory::get();

        return view('admin.provine_categories.edit', compact('region_categories','provine_category'));
    }

    public function update(StoreProvineCategoryRequest $request,ProvineCategory $provine_category) : RedirectResponse
    {
        $provine_category->update($request->validated());

        return redirect()->route('admin.provine_categories.index')->with('message', 'Cập nhật danh mục thành công!');
    }

    public function destroy(ProvineCategory $provine_category) : RedirectResponse
    {
        $provine_category->delete();

        return redirect()->route('admin.provine_categories.index')->with('message', 'Xóa danh mục thành công!');
    }
}
