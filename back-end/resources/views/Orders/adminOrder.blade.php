@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="row">
            <span class="text text-success text-center col-md-6">Payment Status: {{$order->status}} </span> <span class="text text-danger text-center">Payment Status: {{$order->amount}}</span>
        </div>
        <hr>
        @forelse($store_wise_row as $key=>$value)
            <h6 class="text text-center text-secondary">Store ID : {{$key}}</h6>
            @forelse($value as $row)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Store Name</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row"><img src="{{asset($row->model->product_pictures[0])}}" alt=""></td>
                        <td>{{$row->model->name}}</td>
                        <td>{{$row->qty}}</td>
                        <td>{{$row->model->store->name}}</td>

                        <td>{{$row->model->price * $row->qty}}</td>
                    </tr>

                    </tbody>
                </table>
            @empty
                <h1 class="text text-danger">No Data..!!!</h1>
            @endforelse
        @empty
            <h1 class="text text-danger">No Data..!!!</h1>
        @endforelse


    </div>
@endsection
