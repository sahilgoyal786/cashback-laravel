@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <br class="hidden-xs">

            <div class="col-md-8 col-sm-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{asset('carousel/1.jpg')}}" style="width:100%" alt="First slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>Slide 1</h1>

                                    <p>Aenean a rutrum nulla. Vestibulum a arcu at nisi tristique pretium.</p>

                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('carousel/2.jpg')}}" style="width:100%" data-src="" alt="Second    slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>Slide 2</h1>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae egestas
                                        purus. </p>

                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('carousel/3.jpg')}}" style="width:100%" data-src="" alt="Third slide">

                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>Slide 3</h1>

                                    <p>Donec sit amet mi imperdiet mauris viverra accumsan ut at libero.</p>

                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            <div class="col-sm-4 slider-box hidden-xs right-box-homepage">
                <div class="well padding md-200">
                    <h2 class="text-center">Earn cashback</h2>
                    <ul class="list-group hidden-sm">
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-plus"></span> Join SoftCashPay For <strong>Free</strong>
                        </li>
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Go to shopping website via <strong>SoftCashPay</strong>
                        </li>
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-usd"></span> Cashback gets tracked in your <strong>SoftCashPay
                                account</strong>
                        </li>
                    </ul>
                </div>
                @if(Auth::guest())
                    <div class="row">
                        <div class="col-xs-6 text-center">
                            <button type="button" class="btn btn-primary btn-feat" data-target="#registerModal"
                                    data-toggle="modal">JOIN
                            </button>
                        </div>
                        <div class="col-xs-6 text-center">
                            <button type="button" class="btn btn-orange btn-feat" data-target="#loginModal"
                                    data-toggle="modal">LOGIN
                            </button>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
    <br><br>
    @include('general/featured_stores')
    <br><br>
    @include('general/featured_offers')
@endsection