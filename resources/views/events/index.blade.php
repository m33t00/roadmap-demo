@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Events of project &laquo;{{ $project->title }}&raquo;
            </div>

            <div class="panel-body">
                @foreach($project->events()->withTrashed()->get() as $event)
                    <span
                        class="events-list-event {{$event->trashed() ? 'event-deleted' : ''}}"
                    >
                        <a href="{{route('projects.events.show', [$project, $event])}}">
                            {{ $event->date->toDateString() }}
                        </a> - {{ $event->eventType->title }} ({{$event->short_description}})</span>

                    @if(!$event->trashed())
                        <a href="{{ route('projects.events.edit', [$project, $event]) }}">Edit event</a>
                    @endif

                    @if($event->trashed())
                        <p class="event-deleted">
                            event is deleted
                        </p>
                    @endif
                    @if($event->last_update_reason)
                        <p class="event-chande-reason">Change reason: {{$event->last_update_reason}}</p>
                    @endif

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
