@extends('admin/app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">All Offers
                        <a href="{{url('admin/offers/create')}}" class="pull-right">Add offer</a>
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
                                <th>Store</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Expiry Date</th>
                                <th>Description</th>
                                <th>Featured</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($offers))
                                @foreach($offers as $offer)
                                    <tr>
                                        <td>{{$offer['id']}}</td>
                                        <td><img src="{{asset($offer['store_image'])}}" class="img-thumbnail"
                                                 style="max-height: 100px;max-width: 200px;"/></td>
                                        <td>{{$offer['category']}}</td>
                                        <td>{{$offer['name']}}</td>
                                        <td>{{$offer['expiry_date']->format('d-M-Y')}}</td>
                                        <td>{{$offer['description']}}</td>
                                        <td>@if($offer['featured'])<span class="glyphicon glyphicon-star"></span>@endif</td>
                                        <td>
                                            <a href="{{$offer['link']}}" target="_blank"
                                               class="btn btn-default"
                                               aria-label="Edit Offer">
                                                <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                                                &nbsp;&nbsp;Visit Offer
                                            </a>
                                            <a href="{{url('admin/offers/'.$offer['id'])}}/edit" type="button"
                                               class="btn btn-default"
                                               aria-label="Edit Offer">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                &nbsp;&nbsp;Edit
                                            </a>

                                            <form action="{{url('admin/offers/'.$offer['id'])}}" method="post"
                                                  class="form-inline" role="form" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-default" aria-label="Delete Offer">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;&nbsp;Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        There are no categories yet. <a href="{{url('admin/offers/create')}}">Click here</a> to add an
                                        offer.
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="float: right;">
                    {!! str_replace('/?', '?', $offers->render()) !!}
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
@stop
