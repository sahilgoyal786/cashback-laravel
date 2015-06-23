@extends('app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('auth/form/login')
            </div>
        </div>
    </div>
@endsection
