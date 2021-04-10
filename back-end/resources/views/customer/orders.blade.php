@extends('layouts.theme')

@section('content')
    <div class="container">
        @foreach($orders as $order)
            @foreach($carts as $key=>$value)
                @if($key == $order->id)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text text-center" scope="col">Image</th>
                        <th class="text text-center" scope="col">Name</th>
                        <th class="text text-center" scope="col">Quantity</th>
                        <th class="text text-center" scope="col">Price</th>
                    </tr>
                    </thead>
                    @foreach($value as $row)
                        {{-- <p>{{$order->id}} {{$row->model->name}}</p> --}}

                            <tbody>
                                @php $total=0 @endphp
                                <tr>
                                    <td scope="row"><img style="width: 100px;height: 100px;" src="{{asset($row->model->product_pictures[0])}}" alt=""></td>
                                    <td class="text text-center">{{$row->model->name}}</td>
                                    <td  class="text text-center">{{$order->id}}</td>
                                    <td  class="text text-center">{{$row->model->price }}</td>
                                    @php $total+=$row->model->price @endphp
                                </tr>

                            </tbody>

                    @endforeach
                </table>

                @else
                @endif

            @endforeach
        @endforeach

    </div>
@endsection
