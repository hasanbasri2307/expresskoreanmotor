<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('assets/dist/css/timeline.css') }}" rel="stylesheet">

    @yield("custom_css")

    <!-- Custom CSS -->
    <link href="{{ asset('assets/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('assets/bower_components/morrisjs/morris.css') }}" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Express Korean Motor CMS v1</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile ({{ Auth::user()->u_name }})</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <?php
            $path = Route::getCurrentRoute()->getPath();
            $explode = explode('/',$path);

        ?>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="{{ route('home') }}" @if($explode[1] == "home") class="active" @endif><i class="fa fa-dashboard fa-fw"></i> Home</a>
                    </li>
                    <li @if(isset($explode[1])) @if($explode[1] == "master") class="active" @endif @endif>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse @if(isset($explode[1])) @if($explode[1] == "master") in @endif @endif ">
                            <li>
                                <a href="{{ route('user.list') }}" @if(isset($explode[2])) @if($explode[2] == "user") class="active" @endif @endif>Users</a>
                            </li>
                            <li>
                                <a href="{{ route('category.list') }}" @if(isset($explode[2])) @if($explode[2] == "category") class="active" @endif @endif>Categories</a>
                            </li>
                            <li>
                                <a href="{{ route('product.list') }}" @if(isset($explode[2])) @if($explode[2] == "product") class="active" @endif @endif>Products</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route('order.list') }}" @if(isset($explode[1])) @if($explode[1] == "order") class="active" @endif @endif><i class="fa fa-table fa-fw"></i> Orders</a>
                    </li>
                    <li>
                        <a href="{{ route('contact.list') }}" @if(isset($explode[1])) @if($explode[1] == "contact") class="active" @endif @endif><i class="fa fa-desktop fa-fw"></i> Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $title }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        @yield("content")
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('assets/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Morris Charts JavaScript -->

@yield("custom_js")
<!-- Custom Theme JavaScript -->
<script src="{{ asset('assets/dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
