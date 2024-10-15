<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DiscountController extends Controller
{
    public function index() : View
    {
        $discounts = Discount::get();
        return view('admin.discounts.index', compact('discounts'));
    }

    public function create() : View
    {
        return view('admin.discounts.create');
    }
    public function store(StoreDiscountRequest $request) : RedirectResponse
    {

        Discount::create($request->validated());

        return redirect()->route('admin.discounts.index')->with('message', 'Thêm mã giảm thành công!');
    }

    public function edit(Discount $discount) : View
    {
        return view('admin.discounts.edit', compact('discount'));
    }

    public function update(StoreDiscountRequest $request, Discount $discount) : RedirectResponse
    {
        $discount->update($request->validated());

        return redirect()->route('admin.discounts.index')->with('message', 'Cập nhật mã giảm thành công!');
    }

    public function destroy(Discount $discount) : RedirectResponse
    {
        $discount->delete();

        return redirect()->route('admin.discounts.index')->with('message', 'Xóa mã giảm giá thành công!');
    }

    public function checkDiscount(Request $request) {
        $code = $request->input('code');
        $discount = Discount::where('code', $code)->first();
    
        if ($discount) {
            return response()->json(['valid' => true, 'discount' => $discount->value, 'type' => $discount->type]);
        } else {
            return response()->json(['valid' => false]);
        }
    }

}
