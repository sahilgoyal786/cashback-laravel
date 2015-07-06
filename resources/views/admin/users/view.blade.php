@extends('admin/app')

@section('content')
    <style>
        i.fa.fa-inr {
            margin-top: 3px;
            font-size: 20px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Recent Transactions
                        <a href="{{url('admin/transactions/create')}}" class="pull-right">Add Transaction</a></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Retailer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Confirmation Date</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($transactions))
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction['transaction_id']}}</td>
                                        <td>{{$transaction['retailer']}}</td>
                                        <td>{{$transaction['amount']}}</td>
                                        <td>{{$transaction['status']}}</td>
                                        <td>{{$transaction['date']->format('d-M-Y')}}</td>
                                        <td>{{$transaction['confirmation_date']->format('d-M-Y')}}</td>
                                        <td>{{$transaction['type']}}</td>
                                        <td>
                                            <a href="{{url('admin/transactions/'.$transaction['id'])}}/edit" type="button"
                                               class="btn btn-default"
                                               aria-label="Edit">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                &nbsp;&nbsp;Edit
                                            </a>

                                            <form action="{{url('admin/transactions/'.$transaction['id'])}}" method="post"
                                                  class="form-inline" role="form" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-default" aria-label="Delete">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;&nbsp;Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        There are no transactions yet. <a href="{{url('admin/transactions/create')}}">Click here</a> to add an
                                        transaction.
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="panel panel-default">
                    <div class="panel-heading">Earnings</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <td>Total Earnings</td>
                                <td><i class="fa fa-inr"></i> {{$account['total']}}</td>
                            </tr>
                            <tr>
                                <td>Confirmed Earnings</td>
                                <td><i class="fa fa-inr"></i> {{$account['confirmed']}}</td>
                            </tr>
                            <tr>
                                <td>Paid Earnings</td>
                                <td><i class="fa fa-inr"></i> {{$account['paid']}}</td>
                            </tr>
                            <tr>
                                <td>Balance</td>
                                <td><i class="fa fa-inr"></i> {{$account['balance']}}</td>
                            </tr>
                            <tr>
                                <td>Pending Approval</td>
                                <td><i class="fa fa-inr"></i> {{$account['pending']}}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Personal Information</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <td>Name</td>
                                <td>{{$user['name']}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$user['email']}}</td>
                            </tr>
                            <tr>
                                <td>Mobile No.</td>
                                <td>{{$user['mobile_no']}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Payment Information</div>
                    <div class="panel-body">
                        @if($payment_setting)
                            <table class="table table-striped">
                                <tr>
                                    <td>Address</td>
                                    <td>{{$payment_setting['address']}}</td>
                                </tr>
                                <tr>
                                    <td>Bank Name</td>
                                    <td>{{$payment_setting['bank_name']}}</td>
                                </tr>
                                <tr>
                                    <td>Account No.</td>
                                    <td>{{$payment_setting['account_no']}}</td>
                                </tr>
                                <tr>
                                    <td>IFSC Code</td>
                                    <td>{{$payment_setting['ifsc_code']}}</td>
                                </tr>
                                <tr>
                                    <td>Branch Name</td>
                                    <td>{{$payment_setting['branch_name']}}</td>
                                </tr>
                            </table>

                        @else
                            User hasn't added his payment details yet.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


