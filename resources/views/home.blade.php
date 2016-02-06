@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{--You are logged in!--}}


                {{--<div>--}}
                    {{--<h4> Your name is {{ Auth::user()->name }} </h4>--}}
                    {{--<img src="{{ Auth::user()->getAvatar }}" height="200" width="200" />--}}
                {{--</div>--}}

                <h1 class="well well-lg">Upload Image</h1>
                <div class="panel-body">
                    @if(isset($success))
                        <div class="alert alert-success"> {{$success}} </div>
                    @endif
                    {!! Form::open(['action'=>'ImageController@store', 'files'=>true]) !!}

                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>5] ) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('image', 'Choose an image') !!}
                        {!! Form::file('image') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Save', array( 'class'=>'btn btn-danger form-control' )) !!}
                    </div>

                    {!! Form::close() !!}
                    <div class="alert-warning">
                        @foreach( $errors->all() as $error )
                            <br> {{ $error }}
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
