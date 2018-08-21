@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                {{$project->title}}
            </div>
            <div class="panel-body">
                <p>
                    {{$project->description}}
                </p>
                <hr>
                @if ($project->events->count())
                    <h5>
                        <a href="{{route('projects.events.index', $project)}}">
                            {{$project->events->count()}} {{str_plural('event', $project->events->count())}}
                        </a>
                    </h5>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection