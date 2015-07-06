@extends('app')

@section('content')
    @include('user/account_overview')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Payments</div>
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

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Retailer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Confirmation Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($transactions))
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{$transaction['retailer']}}</td>
                                            <td>{{$transaction['amount']}}</td>
                                            <td>{{$transaction['status']}}</td>
                                            <td>{{$transaction['date']->format('d-M-Y')}}</td>
                                            <td>{{$transaction['confirmation_date']->format('d-M-Y')}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            There are no transactions here yet. You can request a payment to your bank, once you have Rs. 250 in your account.
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @include('user.right-nav',['index'=>'5'])
            </div>
        </div>
    </div>
@endsection
