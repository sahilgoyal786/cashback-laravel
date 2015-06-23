@extends('admin/app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="panel panel-default">
                    <div class="panel-heading">All Categories<a href="{{url('admin/categories/create')}}" style="float:right;">Add Category</a></div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Cashback</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($categories))
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category['id']}}</td>
                                    <td>{{$category['name']}}</td>
                                    <td>{{$category['cashback']}}</td>
                                    <td>
                                        <a href="{{url('admin/categories/'.$category['id'].'/edit')}}" type="button" class="btn btn-default"
                                           aria-label="Edit User">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> &nbsp;&nbsp;Edit
                                        </a>

                                        <form action="{{url('admin/categories/'.$category['id'])}}" method="post"  class="form-inline" role="form" style="display: inline-block;">
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
                                    There are no categories yet. <a href="{{url('admin/categories/create')}}">Click here</a> to add a category.
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div style="float: right;">
                    {!! str_replace('/?', '?', $categories->render()) !!}
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="col-md-4">
                <h2>All Categories</h2>
                <img src="{{asset($store->image)}}" class="img-responsive img-thumbnail"/><br>
                <h4 class="">{{$store->name}}</h4>

            </div>
        </div>
    </div>
@stop