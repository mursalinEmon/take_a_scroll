@extends('layouts.theme')

@section('content')
    <div class="container">
        @foreach($orders as $order)
            @foreach($carts as $key=>$value)
                @if($key == $order->id)
                    @foreach($value as $row)
                        <p>{{$order->id}} {{$row->model->name}}</p>
                    @endforeach

                @else
                @endif

            @endforeach
        @endforeach

    </div>
@endsection
