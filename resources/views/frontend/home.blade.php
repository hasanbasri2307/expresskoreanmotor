@extends("frontend.master")
@section("slider")
    @include("frontend.slider")
@endsection
@section("content")
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">New Products</h2>
            @foreach($new_product as $item)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('uploaded/'.$item->pict_1) }}" alt="{{ $item->p_name }}" width="268px" height="249px" />
                                <h2>Rp {{ number_format($item->price) }}</h2>
                                <p>{{ $item->p_name }}</p>
                                <a href="{{ url('product/show/'.$item->id.'/'.str_replace(' ','-',strtolower($item->p_name))) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View detail</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>Rp {{ number_format($item->price) }}</h2>
                                    <p>{{ $item->p_name }}</p>
                                    <a href="{{ url('product/show/'.$item->id.'/'.str_replace(' ','-',strtolower($item->p_name))) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View detail</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div><!--features_items-->


        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Best Seller</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <div class="item active">
                        @foreach($best_seller as $key => $item)
                            @if($key < 3)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('uploaded/'.$item->pict_1) }}" alt="{{ $item->p_name }}" width="268px" height="134px" />
                                                <h2>Rp {{ number_format($item->p) }}</h2>
                                                <p>{{ $item->p_name }}</p>
                                                <a href="{{ url('product/show/'.$item->product_id.'/'.str_replace(' ','-',strtolower($item->p_name))) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View detail</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="item">
                        @foreach($best_seller as $key => $item)
                            @if($key > 2)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('uploaded/'.$item->pict_1) }}" alt="{{ $item->p_name }}" width="268px" height="134px" />
                                                <h2>Rp {{ number_format($item->p) }}</h2>
                                                <p>{{ $item->p_name }}</p>
                                                <a href="{{ url('product/show/'.$item->product_id.'/'.str_replace(' ','-',strtolower($item->p_name))) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View detail</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->

    </div>
@endsection