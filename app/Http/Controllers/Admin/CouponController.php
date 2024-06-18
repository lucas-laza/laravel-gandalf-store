<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'discount_percent' => 'required|integer|min:0|max:100',
        ]);

        Coupon::create($request->all());

        return redirect()->to('admin/coupons')->with('success', 'Coupon created successfully.');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code,' . $coupon->id,
            'discount_percent' => 'required|integer|min:0|max:100',
        ]);

        $coupon->update($request->all());

        return redirect()->to('admin/coupons')->with('success', 'Coupon updated successfully.');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->to('admin/coupons')->with('success', 'Coupon deleted successfully.');
    }
}
