@extends('admin/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Store</div>
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


                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/admin/stores') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('admin/stores/form',['submitButtonText'=>'Add'])
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
