<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Featured Offers</h1>

            @foreach($featured_offers as $index => $featured_offer)
                @if($index%4==0)
                    <div class="row">
                        @endif
                        <div class="col-md-3">
                            <div style="border: 1px solid #dddddd;">
                                <a href="{{url('stores/'.$featured_offer->slug.'#deal-'.$featured_offer->id)}}"
                                   class="thumbnail" style="border: none;margin: 0;">
                                    <img src="{{asset($featured_offer->store_image)}}" alt="Image"
                                         style="max-width:100%;">
                                </a>
                                    <br>

                                    <p class="text-center" style="line-height: 120%;">
                                        <span class="offer-name">{{$featured_offer->name}}</span><br>
                                        <span style="font-size: 40px;">+</span><br>
                                        {{$featured_offer->cashback}} cashback</p>

                                <p>
                                    <a href="#" class="btn btn-primary center-block" style="width: 80%;">Get Deal</a>
                                </p>
                            </div>
                        </div>
                        @if($index%4==3 || ($index+1) == count($featured_offers))
                    </div>
                    @endif
                    @endforeach

                            <!--.Carousel-->

        </div>
    </div>
</div><!--.container-->