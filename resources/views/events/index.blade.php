@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Events of project &laquo;{{ $project->title }}&raquo;
            </div>

            <div class="panel-body">
                @foreach($project->events as $event)
                    <span style="margin-right:20px">{{ $event->date->toDateString() }} - {{ $event->event_type->title }} ({{$event->short_description}})</span>
                    <a href="{{ route('projects.events.edit', [$project, $event]) }}">Edit event</a>
                    <hr>
                @endforeach

                <div class="col-md-8">
                    <a href="{{ route('projects.events.create', $project) }}" class="btn btn-primary">New event</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
