@extends('layout')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('admin/products') }}" class="btn btn-primary btn-block">Manage Products</a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('admin/orders') }}" class="btn btn-primary btn-block">Manage Orders</a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('admin/users') }}" class="btn btn-primary btn-block">Manage Users</a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('admin/coupons') }}" class="btn btn-primary btn-block">Manage Coupons</a>
        </div>
    </div>
</div>
@endsection
