@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update event for project &laquo;{{ $project->title }}&raquo;
                </div>

                <div class="panel-body">
                    @include('events.form')
                </div>
            </div>
        </div>
    </div>
@endsection
