@extends('layouts.theme')

@section('content')
<div class="container">

        @forelse($products as $product)

        <div class="card m-4">
            <div class="card-header">{{ $product->name }}</div>
                <div class="card-body">
                    <p class="text"><i>Brand</i>: {{ $product->brand_name }}</p>
                    <p class="text"><i>Price</i>: {{ $product->price }} </p>
                    <p class="text-muted"> <i>Description:</i> {{ $product->product_decription }} </p>
                    <div class="d-flex flex-row-reverse ">
                        <a href="" class="btn btn-warning "> Edit </a>
                        <a href="" class="btn btn-danger mr-3">Delete</a>
                    </div>
                </div>

        </div>

    @empty
    <h1 class="text-danger">No Products to show...!!</h1>
    @endforelse

       <div class="d-flex flex-row-reverse mr-4 p-4">
        {{ $products->links() }}
       </div>


  </div>

@endsection
