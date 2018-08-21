@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New event type
                </div>
                <div class="panel-body">
                    @include('event_types.form')
                </div>
            </div>
        </div>
    </div>
@endsection