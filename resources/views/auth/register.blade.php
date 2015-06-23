@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            <br>
            @include('auth.form.register')
		</div>
	</div>
</div>
@endsection
