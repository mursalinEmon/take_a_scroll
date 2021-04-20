
@extends('layouts.front-end.theme')
<!-- Product Section Start -->
@section('section')
<div class="product-section section mt-90 mb-90">
    <div class="container">
        @if(Session::has('message'))
            <div  class="alert alert-danger">
                <h1 >{{ Session::get('message') }}</h1>
            </div>
        @endif


        <div class="row">

            <div class="col-12">

                <div class="row mb-50">
                    <div class="col">

                        <!-- Shop Top Bar Start -->
                        <div class="shop-top-bar">

                            <!-- Product View Mode -->
                            <div class="product-view-mode">
                                <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                <a href="#" data-target="list"><i class="fa fa-list"></i></a>
                            </div>

                            <!-- Product Showing -->
                            <div class="product-showing">
                                <p>Showing</p>
                                <select id="paginate" name="showing" class="nice-select">
                                    <option selected value="8">8</option>
                                    <option value="12">12</option>
                                    <option value="16">16</option>
                                    <option value="20">20</option>
                                    <option value="24">24</option>
                                </select>
                            </div>

                            <!-- Product Short -->
                            <div class="product-short">
                                <p>Short by</p>
                                <select name="sortby" class="nice-select">
                                    <option value="trending">Trending items</option>
                                    <option value="sales">Best sellers</option>
                                    <option value="rating">Best rated</option>
                                    <option value="date">Newest items</option>
                                    <option value="price-asc">Price: low to high</option>
                                    <option value="price-desc">Price: high to low</option>
                                </select>
                            </div>

                            <!-- Product Pages -->
                            <div class="product-pages">
                                <p>Pages 1 of 25</p>
                            </div>

                        </div><!-- Shop Top Bar End -->

                    </div>
                </div>

                <!-- Shop Product Wrap Start -->
                <!-- Shop Product Wrap Start -->
                <div class="shop-product-wrap grid row">

                    <div class="row">
                        @forelse ($products as $product)

                            <!-- Product Start -->
                        <div class="ee-product col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10 ">

                            <!-- Image -->
                            <div class="image" style="height: 20vh;width: 100%;">

                                <a href="{{ route('category.products.show',['category'=>$product->category->id,'sub_cat_name'=>$product->subCategory->name,'sub_cat'=>$product->subCategory->id,'product'=>$product->id]) }}" class="img"><img src="{{ asset($product->product_pictures[0]) }}" alt="Product Image"></a>


                                @if ($product->category->categoryType=='cars' )

                                @else
                                <a href="{{ route('cart.add',$product->id) }}" data-para2="{{$product->id}}" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>
                                @endif



                            </div>

                            <!-- Content -->
                            <br>
                            <br><br><br><br>
                            <div class="content">

                                <!-- Category & Title -->
                                <div class="category-title">

                                    <a href="{{ route('category.products.show',['category'=>$product->category->id,'sub_cat_name'=>$product->subCategory->name,'sub_cat'=>$product->subCategory->id,'product'=>$product->id]) }}" class="cat">{{ $sub_cat_name }}</a>
                                    <h5 class="title"><a href="{{ route('category.products.show',['category'=>$product->category->id,'sub_cat_name'=>$product->subCategory->name,'sub_cat'=>$product->subCategory->id,'product'=>$product->id]) }}">{{ $product->name }}</a></h5>

                                </div>

                                <!-- Price & Ratting -->
                                <div class="price-ratting">

                                    <h5 class="price">৳{{ $product->price }}</h5>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>

                                </div>

                            </div>


                        </div>
                        <!-- Product End -->

                        @empty
                            <h1 class="text text-danger">NO Products ..!!</h1>
                        @endforelse


                    </div>


                </div><!-- Shop Product Wrap End -->

                <div class="row mt-30">
                    <div class="col">

                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-angle-left"></i>Back</a></li>
                            {{ $products->links() }}
                            <li><a href="#">Next<i class="fa fa-angle-right"></i></a></li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div><!-- Feature Product Section End -->


@endsection
