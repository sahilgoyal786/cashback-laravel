@extends('admin/app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">All Transactions
                        <a href="{{url('admin/transactions/create')}}" class="pull-right">Add Transaction</a>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Retailer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Confirmation Date</th>
                                <th>User ID</th>
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
                                        <td>{{$transaction['user_id']}}</td>
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
                <div style="float: right;">
                    {!! str_replace('/?', '?', $transactions->render()) !!}
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
@stop
