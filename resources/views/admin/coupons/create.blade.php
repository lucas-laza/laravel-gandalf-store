@extends('layout')

@section('content')
<div class="container">
    <h1>Add New Coupon</h1>
    <form action="{{ url('admin/coupons') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="form-group">
            <label for="discount_percent">Discount (%)</label>
            <input type="number" class="form-control" id="discount_percent" name="discount_percent" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Coupon</button>
    </form>
</div>
@endsection
