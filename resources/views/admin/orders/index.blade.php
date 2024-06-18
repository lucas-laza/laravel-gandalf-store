@extends('layout')

@section('content')
<div class="container">
    <h1>Manage Orders</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Status</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->is_completed ? 'Completed' : 'Pending' }}</td>
                    <td>{{ $order->total }}</td>
                    <td>
                        <a href="{{ url('admin/orders/' . $order->id) }}" class="btn btn-sm btn-info">View</a>
                        <form action="{{ url('admin/orders/' . $order->id) }}" method="POST" style="display:inline-block;">
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
