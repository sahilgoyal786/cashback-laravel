<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">All Stores</h1>
            @foreach($stores as $index => $store)
                @if($index%4==0)
                    <div class="item @if($index==0){{'active'}}@endif">
                        <div class="row">
                            @endif
                            <div class="col-md-3">
                                <a href="{{url('stores/'.$store['slug'])}}" class="thumbnail">
                                    <img src="{{asset($store->image)}}" alt="Image" style="max-width:100%;">
                                    <span>
                                        @if(strcmp($store['max_cashback'],'')==0 || strcmp($store['max_cashback'],'0')==0)
                                            No cashback
                                        @else
                                            Upto {{$store['max_cashback']}} cashback
                                        @endif
                                    </span>
                                </a>
                            </div>
                            @if($index%4==3 || ($index+1) == count($stores))
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
        <!--.Carousel-->

    </div>
</div>