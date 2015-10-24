@extends('admin/app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">All Users</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($users))
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['mobile_no']}}</td>
                                    <td>{{$user['created_at']}}</td>
                                    <td>
                                        <a href="users/view/{{$user['id']}}" type="button" class="btn btn-default"
                                           aria-label="View User">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp;&nbsp;View
                                        </a>
                                        <a href="users/edit/{{$user['id']}}" type="button" class="btn btn-default"
                                           aria-label="Edit User">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> &nbsp;&nbsp;Edit
                                        </a>
                                        @if(Auth::getUser()['email'] != $user['email'])
                                            <a href="users/delete/{{$user['id']}}" type="button" class="btn btn-default"
                                               aria-label="Delete User">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;&nbsp;Delete
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    There are no users.
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div style="float: right;">
                    {!! str_replace('/?', '?', $users->render()) !!}
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
@stop