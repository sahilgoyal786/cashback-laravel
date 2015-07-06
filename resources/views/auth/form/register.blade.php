
<div class="panel panel-default">
    <div class="panel-heading">Register</div>
    <div class="panel-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Mobile No.</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                    <div class="col-md-10 text-center">
                        <div class="checkbox">
                            <input name="agree" type="checkbox" value="1"><label for="agree">I have read and agree to the <a href="#">terms
                                    and conditions</a></label>
                        </div>
                    </div><br><br>



                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">

                        {!! Recaptcha::render() !!}<br>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>

            </form>
            <br>
            <p class="text-center">OR<br>
                <a href="javascript:void(0)" onclick="hideModal('registerModal'),showModal('loginModal');" class="btn btn-default btn-block">Login Now</a></p>
    </div>
</div>