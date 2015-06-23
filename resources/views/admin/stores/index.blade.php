@extends('admin/app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">All Stores<a href="stores/create" style="float:right;">Add Store</a>
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
                                <th>Store ID</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Description</th>
                                <th>Featured</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($stores))
                                @foreach($stores as $store)
                                    <tr>
                                        <td>{{$store['id']}}</td>
                                        <td>{{$store['name']}}</td>
                                        <td><img src="../{{$store['image']}}" class="img-thumbnail"
                                                 style="max-width: 200px;max-height: 100px;"/></td>
                                        <td>{{$store['description']}}</td>
                                        <td>@if($store['featured'])<span class="glyphicon glyphicon-star"></span>@endif</td>
                                        <td>
                                            <a href="{{$store['link']}}" target="_blank"
                                               class="btn btn-default"
                                               aria-label="Edit Offer">
                                                <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                                                &nbsp;&nbsp;Visit Store
                                            </a>
                                            <a href="stores/{{$store['id']}}/categories" type="button"
                                               class="btn btn-default"
                                               aria-label="View User">
                                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                &nbsp;&nbsp;View Categories
                                            </a>
                                            <a href="stores/{{$store['id']}}/edit" type="button" class="btn btn-default"
                                               aria-label="Edit User">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                &nbsp;&nbsp;Edit
                                            </a>

                                            <form action="stores/{{$store['id']}}" method="post" class="form-inline"
                                                  role="form" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-default" aria-label="Delete User">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;&nbsp;Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">
                                        There are no stores yet. <a href="stores/create">Click here</a> to add a store.
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="float: right;">
                    {!! str_replace('/?', '?', $stores->render()) !!}
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
@stop