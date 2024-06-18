@extends('layout')

@section('content')
<div class="container">
    <h1>Manage Coupons</h1>
    <a href="{{ url('admin/coupons/create') }}" class="btn btn-primary mb-3">Add New Coupon</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Discount (%)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->discount_percent }}</td>
                    <td>
                        <a href="{{ url('admin/coupons/' . $coupon->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ url('admin/coupons/' . $coupon->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
