@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Convert image</div>

                    <div class="panel-body">
                        <div class="panel-body">
                            @if(isset($success))
                                <div class="alert alert-success" style="background-color:#FFFFFF; color:#000000;">
                                    <b>Converted Text:</b> <br>
                                    {{$success}}
                                    @if(isset($trans))
                                        <br>
                                        <b>Translated text:</b> <br>
                                        {{$trans}}
                                    @endif


                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            Languages <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/translate/bg') }}">Bulgarian</a></li>
                                            <li><a href="{{ url('/translate/ru') }}">Russian</a></li>
                                            <li><a href="{{ url('/translate/fr') }}">French</a></li>
                                            <li><a href="{{ url('/translate/de') }}">German</a></li>
                                            <li><a href="{{ url('/translate/es') }}">Spanish</a></li>
                                        </ul>
                                    </li>

                                </div>
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
                                {!! Form::submit('Convert', array( 'class'=>'btn btn-danger form-control' )) !!}
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
