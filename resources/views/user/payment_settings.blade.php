@extends('app')

@section('content')
    @include('user/account_overview')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Payment Settings</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                {{ session('status') }}
                            </div>
                        @endif
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


                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/payment_settings') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="address">{{ $settings['address'] }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Bank Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="bank_name" value="{{ $settings['bank_name'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Branch Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="branch_name" value="{{ $settings['branch_name'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Account No.</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="account_no" value="{{ $settings['account_no'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">IFSC Code</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ifsc_code" value="{{ $settings['ifsc_code'] }}">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @include('user.right-nav',["index"=>"2"])
            </div>
        </div>
    </div>
@endsection
