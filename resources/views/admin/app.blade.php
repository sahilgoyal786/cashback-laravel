<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoftCashPay</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SoftCashPay</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/admin/home') }}">Home</a></li>
                <li><a href="{{ url('/admin/stores') }}">Stores</a></li>
                <li><a href="{{ url('/admin/categories') }}">Categories</a></li>
                <li><a href="{{ url('/admin/offers') }}">Offers</a></li>
                <li><a href="{{ url('/admin/users') }}">Users</a></li>
                <li><a href="{{ url('/admin/transactions') }}">Transactions</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
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
        </div>
    </div>
</nav>

@yield('content')

{{--<footer>--}}

    {{--<div class="container-fluid" style="color:#ffffff;background-color: #262626;padding: 20px 0 50px;">--}}
        {{--<div class="text-center center-block">--}}
            {{--&copy; SoftCashPay, All Rights Reserved--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/select2.min.js')}}"></script>

@yield('footer')

<script>
    $('select').each(function(){
        if($(this).attr('select') != undefined){
            var value =$(this).attr('select');
            console.log('Trying to match - '+value);
            $(this).val($(this).attr('select'));
            $(this).find('option').each(function(){
                if($(this).text() == value){
                    $(this).attr('selected','true');
                }
            });
            $(this).trigger("change");
        }
    });
    $('select').each(function(){
        if($(this).attr('index') != undefined){
            var value =$(this).attr('index');
            console.log('Trying to match - '+value);
            $(this).val($(this).attr('select'));
            $(this).find('option').each(function(){
                if($(this).val() == value){
                    $(this).attr('selected','true');
                }
            });
            $(this).trigger("change");
        }
    });
</script>
</body>
</html>
