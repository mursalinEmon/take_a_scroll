@extends('layouts.theme')
@section('content')
<div class="container">

    @forelse($stores as $store)
    <div class="card m-3" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('/'.$store->banner) }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $store->name }}</h5>
          <p class="card-text">{{ $store->description }}</p>
          <a href="#" class="btn btn-primary">Browser</a>
        </div>
      </div>
    @empty
        <h1 class="text-danger">NO Stores For You</h1>
    @endforelse
</div>
@endsection
