
<div class="footer container-fluid hidden-xs">
    <div class="container">
        <div class="row">

            <br class="hidden-xs">
            <div class="col-sm-4 col-sm-offset-2">

                <h4>Important Links</h4>
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/all_stores')}}">All Stores</a></li>
                    <li><a href="{{url('/terms')}}">Terms & Conditions</a></li>
                    <li><a href="{{url('/privacy')}}">Privacy Policy</a></li>
                    <li><a href="{{url('/how-it-works')}}">How it Works</a></li>
                    <li><a href="{{url('/about')}}">About Us</a></li>
                    <li><a href="{{url('/contact')}}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-sm-offset-2">

                <h4>Categories</h4>
                <ul>
                    @foreach($all_categories as $category)
                        <li><a href="{{ url('/categories/'.$category['slug']) }}">{{ucwords($category['name'])}}</a></li>
                    @endforeach
                </ul>
            </div>
            <br class="hidden-xs">
        </div>
    </div>
</div>
<div class="copyright container-fluid">
    <div class="container">
        <div class="row">
            <br class="hidden-xs">
            <div class="col-sm-12 text-center">
                <p>SoftCashPay &copy; 2015, All Rights Reserved</p>
            </div>
            <br class="hidden-xs">
        </div>
    </div>
</div>