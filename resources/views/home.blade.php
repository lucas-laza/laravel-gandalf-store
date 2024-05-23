@extends('layout')

@section('title', 'Home')

@section('content')
    <h1>Welcome to My Laravel App</h1>
    <p>This is the home page.</p>

    <div class="container">
      <h1>Categories</h1>
      <div class="row">
          @foreach($categories as $category)
              <div class="col-md-3">
                  <div class="card mb-4">
                      <div class="card-body">
                          <h5 class="card-title">{{ $category->name }}</h5>
                          <a href="{{ url('/category/' . $category->name) }}" class="btn btn-primary">View Products</a>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
  </div>
@endsection
