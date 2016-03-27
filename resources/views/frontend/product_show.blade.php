@extends("frontend.master")
@section("meta_sosmed")
    <!-- facebook meta-->
    <meta property="og:image" content="{{ asset('uploaded/'.$product->pict_1) }}"/>
    <meta property="og:title" content="{{ $product->p_name }}"/>
    <meta property="og:url" content="{{ url('product/show/'.$product->id.'/'.str_replace(' ','-',strtolower($product->p_name))) }}"/>
    <meta property="og:site_name" content="Express Korean Motor"/>
    <meta property="og:type" content="ecommerce"/>
    <meta property="og:description" content="{{ $product->description }}" />
    <meta property="article:published_time" content="{{ str_replace('+00:00', 'Z', gmdate('c', strtotime($product->created_at))) }}" />
    <meta property="article:modified_time" content="{{ str_replace('+00:00', 'Z', gmdate('c', strtotime($product->updated_at))) }}" />
    <meta property="article:tag" content="{{ $product->tags }}" />

    <!-- twitter meta-->
    <meta name="twitter:card" content="{{ $product->p_name }}">
    <meta name="twitter:site" content="@koreanexpressmotor">
    <meta name="twitter:title" content="{{ $product->p_name }}">
    <meta name="twitter:description" content="{{ $product->description }}">
    <meta name="twitter:creator" content="@koreanexpressmotor">
    <meta name="twitter:image" content="{{ asset('uploaded/'.$product->pict_1) }}">

    <!-- gplus meta-->
    <meta itemprop="name" content="{{ $product->p_name }}">
    <meta itemprop="description" content="{{ $product->description }}">
    <meta itemprop="image" content="{{ asset('uploaded/'.$product->pict_1) }}">

@endsection
@section("content")
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ asset('uploaded/'.$product->pict_1) }}" alt="{{ $product->p_name }}" />

                </div>

                @if(!empty($product->pict_2) and !empty($product->pict_3))
                    <div id="similar-product" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->

                        <div class="carousel-inner">
                            <div class="item active">
                                <a href=""><img src="{{ asset('uploaded/'.$product->pict_1) }}" alt=""></a>
                                <a href=""><img src="{{ asset('uploaded/'.$product->pict_2) }}" alt=""></a>
                                <a href=""><img src="{{ asset('uploaded/'.$product->pict_3) }}" alt=""></a>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left item-control" href="#similar-product" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right item-control" href="#similar-product" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                @endif

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2>{{ $product->p_name }}</h2>
                    <p>Product ID: #{{ $product->id }}</p>

								<span>
									<span>Rp {{ number_format($product->price) }}</span>

								</span>
                    <p><b>Availability:</b> {{ ($product->is_available==1) ? 'In Stock' : 'Out of Stock' }}</p>
                    <p><b>Category:</b> {{ $product->category->cat_name }}</p>
                    <a href="http://www.facebook.com/sharer.php?u={{ urlencode(url('product/show/'.$product->id.'/'.str_replace(' ','-',strtolower($product->p_name)))) }}" target="_blank" title="Click to share">
                        <img src="{{ asset('assets/frontend/facebook.png') }}">
                    </a>
                    <a href="https://plus.google.com/share?url={{ urlencode(url('product/show/'.$product->id.'/'.str_replace(' ','-',strtolower($product->p_name)))) }}" target="_blank" title="Click to share">
                        <img src="{{ asset('assets/frontend/google-plus.png') }}">
                    </a>
                    <a href="http://twitter.com/share?text={{ urlencode($product->p_name) }};url={{ urlencode(url('product/show/'.$product->id.'/'.str_replace(' ','-',strtolower($product->p_name)))) }}" target="_blank" title="Click to post to Twitter">
                        <img src="{{ asset('assets/frontend/tweet.png') }}">
                    </a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#reviewss" data-toggle="tab">Description & Order</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="reviews" >
                    <div class="col-sm-12">
                        <h4>Desc</h4>
                        <p>{{ $product->description }}</p>
                        <br /><br />

                        @if(Session::has('success'))
                            <div class="status alert alert-success" >{{ Session::get('success') }}</div>
                        @endif
                        {!! Form::open(array('route'=>'product.post','method'=>'post')) !!}
										<span>
											<input type="text" placeholder="Your Name" name="fullname" required/>
											<input type="email" placeholder="Email Address" name="email" required/>
										</span>
                                        <br />
                                         <span>
											<input type="text" placeholder="Phone" name="phone" required/>
											<input type="text" placeholder="Qty" name="qty" required/>
										</span>
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <textarea name="address" required placeholder="Address" ></textarea>

                            <button type="submit" class="btn btn-default pull-right">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Related Product</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($related_product as $key => $item)
                            @if($key < 3)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('uploaded/'.$item->pict_1) }}" alt="{{ $item->p_name }}" width="268px" height="134px" />
                                                <h2>Rp {{ number_format($item->price) }}</h2>
                                                <p>{{ $item->p_name }}</p>
                                                <a href="{{ url('product/show/'.$item->id.'/'.str_replace(' ','-',strtolower($item->p_name))) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View detail</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="item">
                        @foreach($related_product as $key => $item)
                            @if($key > 2)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('uploaded/'.$item->pict_1) }}" alt="{{ $item->p_name }}" width="268px" height="134px" />
                                                <h2>Rp {{ number_format($item->price) }}</h2>
                                                <p>{{ $item->p_name }}</p>
                                                <a href="{{ url('product/show/'.$item->id.'/'.str_replace(' ','-',strtolower($item->p_name))) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View detail</a>
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