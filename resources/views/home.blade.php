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
                        </div>
                        <div class="item">
                            <img src="{{asset('carousel/2.jpg')}}" style="width:100%" data-src="" alt="Second slide">
                        </div>
                        <div class="item">
                            <img src="{{asset('carousel/3.jpg')}}" style="width:100%" data-src="" alt="Third slide">
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
                            <span class="glyphicon glyphicon-piggy-bank"></span> Cashback gets tracked in your <strong>SoftCashPay
                            </strong>account in 72 Hours
                        </li>
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-usd"></span> Cashback gets confirmed in 8-12 weeks and is transferred to your bank
                        </li>
                    </ul>
                </div>
                @if(Auth::guest())
                    <div class="row">
                        <div class="col-xs-6 text-center">
                            <button type="button" class="btn btn-primary btn-block" data-target="#registerModal"
                                    data-toggle="modal">JOIN
                            </button>
                        </div>
                        <div class="col-xs-6 text-center">
                            <button type="button" class="btn btn-orange btn-block" data-target="#loginModal"
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