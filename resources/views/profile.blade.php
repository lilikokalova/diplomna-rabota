@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">

                        <h4> First name: {{ Auth::user()->name }} </h4>
                        <h4> Last name: {{ Auth::user()->lastname }} </h4>
                        <h4> E-mail: {{ Auth::user()->email }} </h4>
                        <h4> Created at: {{ Auth::user()->created_at }} </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
