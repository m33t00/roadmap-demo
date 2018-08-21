@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    {{$project->title}}: {{$event->eventType->title}} ({{$event->date->toDateString()}})
                </div>
                <div class="panel-body">
                    <p>
                        {{$event->short_description}}
                    </p>
                    <p>
                        {{$event->description}}
                    </p>
                    @if($event->last_update_reason)
                        <p>
                        Update reason: {{$event->last_update_reason}}
                        </p>
                    @endif
                    <hr>
                    <a
                        href="{{route('projects.events.edit', [$project, $event])}}"
                        class="btn btn-primary"
                    >Update event</a>
                </div>
            </div>
        </div>
    </div>
@endsection