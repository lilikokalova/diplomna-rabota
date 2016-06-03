@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit profile</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/editprofile/update') }}">
                            {!! csrf_field() !!}

                            @foreach($entries as $entry)
                                <div class="form-group">
                                    <label class="col-md-4 control-label">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" value="{{$entry->name}}" >
                                    </div>
                                 </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Last Name</label>
                                    <div class="col-md-6">
                                    <input type="text" class="form-control" name="lastname" value="{{$entry->lastname}}" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-mail</label>
                                    <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" value="{{$entry->email}}" >
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::submit('Update', array( 'class'=>'btn btn-danger form-control' )) !!}
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection