<div class="panel panel-default">
    <div class="panel-heading">Login</div>
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
        <div class="col-md-12 text-center">
            <a href="{{url('auth/login/facebook')}}" class="btn btn-primary login-with-fb">Login with Facebook</a>
            <br>
            <br>
        </div>

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail Address / Phone No.</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">

                    <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <br>

        <p class="text-center">OR<br>
            <a href="javascript:void(0)" onclick="hideModal('loginModal'),showModal('registerModal');"
               class="btn btn-default btn-block">Register Now</a></p>
    </div>
</div>