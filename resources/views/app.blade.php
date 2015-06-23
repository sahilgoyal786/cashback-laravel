<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoftCashPay</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default" style="margin-bottom: 0;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">SoftCashPay</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/stores') }}">All Stores</a></li>
                <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-expanded="false">Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/categories') }}">Electronics</a></li>
                        <li><a href="{{ url('/categories') }}">Clothing</a></li>
                        <li><a href="{{ url('/categories') }}">Kitchen</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
                    {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
                    <li><a href="javascript:void(0)" onclick="showModal('loginModal')">Login</a></li>
                    <li><a href="javascript:void(0)" onclick="showModal('registerModal')">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/user/account') }}">My Account</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <form class="navbar-form navbar-right">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                </div>
            </form>
        </div>
    </div>
</nav>

@yield('content')
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
@yield('footer')
<script>
    function showModal(param) {
        $('#' + param).modal('show');
    }
    function hideModal(param) {
        $('#' + param).modal('hide');
    }
    $(document).ready(function () {
        $('.more').each(function () {
            var text = $(this).text();
            var newtext = text;
            if (text.length > 100) {
                var newtext = '';
                newtext = text.substring(0, 100);
                newtext += '<span style="display:none;" class="morecontent">' + text.substring(100) + ' </span>';
                newtext += '<span class="elipses"> ... </span>';
                newtext += '<span class="morelink"><a href="javascript:void(0)">more</a></span>';
            }
            $(this).html(newtext);
        });
        $('.morelink a').click(function () {
            if ($(this).text() == 'more') {
                $(this).parent().prev('.elipses').hide();
                $(this).text('less');
                $(this).parent().prev().prev().show();
            } else {
                $(this).parent().prev('.elipses').show();
                $(this).text('more');
                $(this).parent().prev().prev().hide();
            }
        });
    });
</script>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body" id="modal-body">
                @include('auth/form/login')
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body" id="modal-body">
                @include('auth/form/register')
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</body>
</html>
