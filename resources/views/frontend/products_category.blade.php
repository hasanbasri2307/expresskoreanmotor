@extends("frontend.master")
@section("content")

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Category (<b>{{ str_replace("-"," ",$cat_name) }}</b>)</h2>
            @foreach($products as $item)
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


                {!! $products->links() !!}

        </div><!--features_items-->
    </div>
@endsection