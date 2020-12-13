@extends('layouts.theme')

@section('content')
<div class="container">
    @forelse($products as $product)
       <div class="m-4">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>
                <div class="card-body"><i>Brand</i>{{ $product->brand_name }} </div>
                <div class="card-body"><i>Price</i>{{ $product->price }} </div>
                <div class="card-body text-muted"> <i>Description:</i>{{ $product->product_decription }} </div>

            </div>
       </div>

    @empty
        <h1 class="text-danger">No Products to show...!!</h1>
    @endforelse

</div>
@endsection
