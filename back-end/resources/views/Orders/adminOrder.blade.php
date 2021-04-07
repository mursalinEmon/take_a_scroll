@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="row">
            <span class="text text-success text-center col-md-6">Payment Status: {{$order->status}} </span> <span class="text text-danger text-center">Payment Status: {{$order->amount}}</span>
        </div>
        <hr>
        @forelse($store_wise_row as $key=>$value)
            <h2 class="text text-center text-primary">Store ID : {{$key}}</h2>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text text-center" scope="col">Image</th>
                        <th class="text text-center" scope="col">Name</th>
                        <th class="text text-center" scope="col">Quantity</th>
                        <th class="text text-center" scope="col">Store Name</th>
                        <th class="text text-center" scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($value as $row)
                    <tr>
                        <td scope="row"><img style="width: 100px;height: 100px;" src="{{asset($row->model->product_pictures[0])}}" alt=""></td>
                        <td class="text text-center">{{$row->model->name}}</td>
                        <td  class="text text-center">{{$row->qty}}</td>
                        <td  class="text text-center">{{$row->model->store->name}}</td>
                        <td  class="text text-center">{{$row->model->price * $row->qty}}</td>
                    </tr>
                    @empty
                        <h1 class="text text-danger">No Data..!!!</h1>
                    @endforelse
                    </tbody>
                </table>

        @empty
            <h1 class="text text-danger">No Data..!!!</h1>
        @endforelse


    </div>
@endsection
