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
                            <li><a href="#"><i class="fa fa-envelope"></i> agus@expresskoreanmotor.com</a></li>
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
                            <li><a href="{{ route('front.product') }}" class="{{ (Route::is('front.product') or Route::is('product.detail'))? 'active':'' }}">Products</a></li>
                            <li><a href="{{ route('front.service') }}" class="{{ (Route::is('front.service'))? 'active':'' }}">Our Service</a></li>
                            <li><a href="{{ route('front.buy') }}" class="{{ (Route::is('front.buy'))? 'active':'' }}">How to Buy</a></li>
                            <li><a href="{{ route('front.contact') }}" class="{{ (Route::is('front.contact'))? 'active':'' }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                {!! Form::open(array('route'=>'product.search','method'=>'get')) !!}
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search" name="keyword"/>
                        <input type="hidden" name="submit" value="submit">
                    </div>
                    {{ Form::close() }}
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    @if(Session::has('success'))
                        <div class="status alert alert-success" >{{ Session::get('success') }}</div>
                    @endif
                    <br />
                    {!! Form::open(array('route'=>'contact.post','method'=>'post','class'=>'contact-form row')) !!}

                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="messages" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>Express Motor</p>
                        <p>Ruko Sentra Onderdil Mobil</p>
                        <p>Harapan Indah Blok EN No. 19 Bekasi</p>
                        <p>Jakarta Utara 14420, Indonesia</p>
                        <p>Phone: 021- 296 805 07</p>
                        <p>Hp. : 087-875 236 319 / 021 -96269145 (Esia)</p>
                        <p>Email: expressmtrkholid@gmail.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->


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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/gmaps.js') }}"></script>
<script src="{{ asset('assets/frontend/js/price-range.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>
</html>