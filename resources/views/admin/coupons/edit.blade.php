@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Coupon</h1>
    <form action="{{ url('admin/coupons/' . $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $coupon->code }}" required>
        </div>
        <div class="form-group">
            <label for="discount_percent">Discount (%)</label>
            <input type="number" class="form-control" id="discount_percent" name="discount_percent" value="{{ $coupon->discount_percent }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Coupon</button>
    </form>
</div>
@endsection
