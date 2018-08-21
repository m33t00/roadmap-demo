@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New event for project &laquo;{{ $project->title }}&raquo;
                </div>



                <div class="panel-body">
                    @if (!\App\Models\EventType::count())
                        <p>
                            You have not any event types created. Please,
                            <a href="{{ route('event_types.create') }}">create</a>
                            at least one event type.
                        </p>
                    @else
                        @include('events.form', compact('project'))
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
