<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Featured Stores</h1>

            <div id="Carousel" class="carousel stores-carousel slide">

                <ol class="carousel-indicators stores-carousel-indicators">
                    @for($count=0;$count<count($featured_stores)/4;$count++)
                        <li data-target="#Carousel" data-slide-to="{{$count}}" @if($count==0){!!'class="active"'!!}@endif></li>
                    @endfor
                </ol>

                <!-- Carousel items -->
                <div class="carousel-inner">

                    @foreach($featured_stores as $index => $store)
                        @if($index%4==0)
                            <div class="item @if($index==0){{'active'}}@endif">
                                <div class="row">
                                    @endif
                                    <div class="col-md-3">
                                        <a href="{{url('stores/'.$store['slug'])}}" class="thumbnail">
                                            <img src="{{asset($store->image)}}" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    @if($index%4==3 || ($index+1) == count($featured_stores))
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <!--.carousel-inner-->
                <a data-slide="prev" href="#Carousel" class="left stores-carousel-control carousel-control">‹</a>
                <a data-slide="next" href="#Carousel" class="right stores-carousel-control carousel-control">›</a>
            </div>
            <!--.Carousel-->

        </div>
    </div>
</div><!--.container-->