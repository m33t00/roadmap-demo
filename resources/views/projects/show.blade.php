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
                <a
                    href="{{route('projects.user_access.index', $project)}}"
                    class="btn btn-primary"
                >Manage user access</a>
            </div>
        </div>
    </div>
</div>
@endsection