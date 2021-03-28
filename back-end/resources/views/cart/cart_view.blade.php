@extends('layouts.front-end.theme')
@section('section')



<!-- Cart Page Start -->
<div class="page-section section pt-90 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <!-- Cart Table -->
                    <div class="cart-table table-responsive mb-40">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count=0;@endphp
                                @forelse(Cart::content() as $row)
                                @php $count++;@endphp
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img src="{{  asset($row->model->product_pictures[0])  }}" alt="Product"></a></td>
                                        <td class="pro-title"><a href="#">{{ $row->name }}</a></td>
                                        <td class="pro-price"><span> ৳{{ $row->price }}</span></td>

                                        <td class="pro-quantity"><div class="pro-qty"><span id="{{ $row->rowId }}"  class="dec qtybtn">-</span><input  type="text" value="{{ $row->qty }}"><span id="{{ $row->rowId }}" class="inc qtybtn">+</span></div></td>

                                        <td class="pro-subtotal"> ৳<input id="item-price-{{ $row->rowId }}"  value={{ $row->price }} size="5"  disabled ></td>

                                        <td class="pro-remove"><a href="#"><i class="fa fa-trash-o remove-cart" data-rowid="{{ $row->rowId }}"></i></a></td>
                                    </tr>
                                    <tr>
                                        @if($count==1)
                                        <a  href="{{ route('cart.checkout') }}" class="btn btn-success float-right mr-4 pr-4 mt-4 mb-4"><span class="text text-white">Check-Out</span></a>
                                        @endif
                                    </tr>
                                @empty
                                    <h1 class="text text-danger">Empty Cart ....!!</h1>
                                    <br>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </form>

                <div class="row">

                </div>

            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->



<!-- JS
============================================ -->



@endsection
