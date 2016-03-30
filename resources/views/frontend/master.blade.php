<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    @yield("meta_sosmed")

    <title>{{ $title }}</title>
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/frontend/js/html5shiv.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +021- 296 805 07</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> expressmtrkholid@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->


    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('front.home') }}" class="{{ (Route::is('front.home'))? 'active':'' }}">Home</a></li>
                            <li><a href="{{ route('front.about') }}" class="{{ (Route::is('front.about'))? 'active':'' }}">About Us</a></li>
                            <li><a href="{{ route('front.product') }}" class="{{ (Route::is('front.product') or Route::is('product.detail') or Route::is('front.product.category'))? 'active':'' }}">Products</a></li>
                            <li><a href="{{ route('front.service') }}" class="{{ (Route::is('front.service'))? 'active':'' }}">Our Service</a></li>
                            <li><a href="{{ route('front.buy') }}" class="{{ (Route::is('front.buy'))? 'active':'' }}">How to Buy</a></li>
                            <li><a href="{{ route('front.contact') }}" class="{{ (Route::is('front.contact'))? 'active':'' }}">Contact</a></li>
                            <li><a href="{{ route('front.testimonial') }}" class="{{ (Route::is('front.testimonial'))? 'active':'' }}">Testimonial</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    {!! Form::open(array('route'=>'product.search','method'=>'get')) !!}
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search" name="keyword"/>
                        <input type="hidden" name="submit" value="submit">
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

@yield("slider")

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($category as $item)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{ url('products/category/'.$item->id.'/'.str_replace(' ','-',strtolower($item->cat_name))) }}">{{ $item->cat_name }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div><!--/category-products-->



                </div>
            </div>

            @yield("content")
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->



    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © {{ date("Y") }} Express Korean Motor .</p>

            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/price-range.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    <script type="text/javascript">
            window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
                    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
                $.src="//v2.zopim.com/?3nNjlMLhMlFc59e5PFjMWHs4mb4njMdO";z.t=+new Date;$.
                        type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

</script>
</body>
</html>