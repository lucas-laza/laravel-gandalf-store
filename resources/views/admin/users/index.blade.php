@extends('layout')

@section('content')
<div class="container">
    <h1>Manage Users</h1>
    <a href="{{ url('admin/users/create') }}" class="btn btn-primary mb-3">Add New User</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ url('admin/users/' . $user->id) }}" method="POST" style="display:inline-block;">
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
