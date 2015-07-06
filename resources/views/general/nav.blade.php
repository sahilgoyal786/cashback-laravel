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

            <div class="col-xs-8 col-xs-offset-2">
                <form class="visible-xs" style="margin: 10px 0;">
                    <select class="form-control store_search" id="store_search">
                        <option></option>
                        @foreach($all_stores as $store)
                            <option value="{{$store['slug']}}">{{$store['name']}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/all_stores') }}">All Stores</a></li>
                <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-expanded="false">Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($all_categories as $category)
                            <li><a href="{{ url('/categories/'.$category['slug']) }}">{{$category['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
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
            <form class="navbar-form navbar-right hidden-xs">
                <select class="form-control store_search" id="store_search">
                    <option></option>
                    @foreach($all_stores as $store)
                        <option value="{{$store['slug']}}">{{$store['name']}}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
</nav>