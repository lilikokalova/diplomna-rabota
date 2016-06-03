@extends('layouts.app')

@section('content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">All Image List</div>

                    <div class="panel-body">

                             @foreach( $images as $image )
                                 @if ($image->user_id == Auth::user()->id)
                                    <label class="col-md-4 control-label">Title: {{$image->title}}</label>
                                    <div class="table table-bordered bg-success"><a href="{!! '/images/'.$image->filePath !!}">{{$image->filePath}}</a></div>
                                 @endif
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection