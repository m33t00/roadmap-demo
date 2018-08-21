@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    {{$project->title}}: {{$event->event_type->title}} ({{$event->date}})
                </div>
                <div class="panel-body">
                    <p>
                        {{$event->short_description}}
                    </p>
                    <p>
                        {{$event->description}}
                    </p>
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