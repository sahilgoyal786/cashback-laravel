@extends('app')
@section('content')
    <br class="hidden-xs">
    <script type="text/javascript">var switchTo5x = true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({
            publisher: "ea1cfdcc-761d-4b48-bd04-7399eb420469",
            doNotHash: false,
            doNotCopy: false,
            hashAddressBar: false
        });</script>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-8">
                <div class="media">
                    <div class="pull-left-md text-center">
                        <img class="media-object" src="{{asset($store['image'])}}" alt="{{$store['name']}}"
                             style="max-width: 200px;max-height: 150px;margin: 0 10px 10px;">
                    </div>
                    <div class="media-body">
                        <h2 class="headline hidden-xs">{{$store['name']}} Offers &amp; Discount Coupons
                        </h2>

                        <p class="hidden-xs"><span class="more">{!!$store['description']!!}</span></p>
                        <br class="visible-xs">

                        <div class="social-strip">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <br>

                <div style="height: 66px;" class="text-center">
                    <b>Share:</b><br>
                    <span class='st_facebook_large' displayText='Facebook'></span>
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_googleplus_large' displayText='Google +'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st_pinterest_large' displayText='Pinterest'></span>
                    <span class='st_email_large' displayText='Email'></span>
                    <br>
                </div>
                <a link="{{url($store['link'])}}" href="javascript:void(0);" class="btn btn-primary center-block btn-lg deal-btn">Visit Store</a>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-8">
                <hr>
                <h3 class="center-block text-center">Active Offers & Deals</h3>
                <hr>
                @if(count($offers))
                    @foreach($offers as $offer)
                        <div class="deal" id="deal-{{$offer['id']}}">
                            <div class="col-sm-8">
                                <h2>{{$offer['name']}}</h2>

                                <h3>+Get Upto 12% CashBack</h3>

                                <p class="hidden-sm hidden-xs">{{$offer['description']}}</p>
                            </div>
                            <div class="col-md-3 col-md-offset-1 col-sm-4 text-center">
                                <a id="{{$offer['id']}}" link="{{$offer['link']}}" href="javascript:void(0);"
                                   class="btn btn-primary btn-block deal-btn" data-value="Deal Activated">Grab Deal</a>
                                <br class="hidden-xs">
                                <a href="javascript:void(0);" class="hiw hidden-xs hidden-sm" id="hiw_13218"
                                   data-value="0">
                                    <span class="glyphicon glyphicon-question-sign"></span>
                                    How it works?
                                </a>
                                <br>

                                <p>
                                    <span>Expiring on <strong>{{$offer['expiry_date']->format('M-d-Y')}}</strong></span><br>
                                    {{$offer['expiry_date']->diffForHumans()}}
                                </p></div>

                            <div class="clearfix"></div>
                            <hr>
                        </div>
                    @endforeach
                @else
                    <p>There are currently no active offers.</p>
                    <hr>
                @endif

                <div class="hidden-xs">
                    <br>
                    <br>

                    <hr>
                    <h3 class="center-block text-center">Expired Offers & Deals</h3>
                    <hr>
                    @if(count($expired_offers))
                        @foreach($expired_offers as $offer)
                            <div class="deal">
                                <div class="col-sm-8">
                                    <h2>{{$offer['name']}}</h2>

                                    <h3>+Get Upto 12% CashBack</h3>

                                    <p class="hidden-sm hidden-xs">{{$offer['description']}}</p>
                                </div>
                                <div class="col-md-3 col-md-offset-1 col-sm-4 text-center">
                                    <a id="{{$offer['id']}}" link="{{$offer['link']}}" href="javascript:void(0);"
                                       class="btn btn-primary btn-block" data-value="Deal Activated"
                                       disabled="disabled">Grab
                                        Deal</a>
                                    <br>
                                    <a href="javascript:void(0);" class="hiw hidden-xs hidden-sm" id="hiw_13218"
                                       data-value="0">
                                        <span class="glyphicon glyphicon-question-sign"></span>
                                        How it works?
                                    </a>
                                    <br>

                                    <p>
                                        <span>Expiring on <strong>{{$offer['expiry_date']->format('M-d-Y')}}</strong></span><br>
                                        {{$offer['expiry_date']->diffForHumans()}}
                                    </p></div>

                            </div>
                        @endforeach
                    @else
                        <p>There are currently no offers in this category.</p>
                    @endif
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <hr>
                <h4 class="text-uppercase">Cashback Rates</h4>
                <hr>
                @if(count($categories))
                    @foreach($categories as $category)
                        <p><h4><span class="category-cashback-label">{{$category['cashback']}}</span>
                            &nbsp;&nbsp;{{$category['name']}}</h4></p>
                    @endforeach
                @else
                    <hr>
                    <p>Sorry, there are no Cashback offers.</p>
                    <hr>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')

    <script>
        @if (Auth::guest())
        var guest = true;
                @else
                    var guest = false;
        @endif
        $('.deal-btn').click(function () {
                    if (guest) {
                        showModal('loginModal');
                    } else {
                        var link = $(this).attr('link');
                        showModal('dealModal');
                        $('#dealModal').find('#link').attr('href',link);
                    }
                });
    </script>

    <div class="modal fade" id="dealModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body" id="modal-body">
                    @include('general/deal')
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection