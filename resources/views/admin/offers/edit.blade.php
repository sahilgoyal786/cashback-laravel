@extends('admin/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Offer - {{$offer['name']}}</div>
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


                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST"
                              action="{{ url('/admin/offers/'.$offer['id']) }}">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('admin/offers/form',['submitButtonText'=>'Update']);
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        var data = JSON.parse('{!!json_encode($categories)!!}');
        $('#parent_selection').on('change',dependentSelection);
        function dependentSelection(){
            var store = $(this).val();
            html = '';
            for(i=0;i<data[store].length;i++)
                html += '<option value="'+data[store][i]['id']+'">'+data[store][i]['name']+'</option>';

            $('#child_selection').html(html);
        }
    </script>
@endsection