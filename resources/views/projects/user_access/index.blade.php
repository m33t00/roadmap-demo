@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Projects
                </div>
                <div class="panel-body">
                    @foreach($users as $user)
                        <p>
                            {{$user->email}}
                            (<span
                                class="{{$project->isUserCanRead($user) ? 'text-success' : 'text-danger'}}"
                            >view</span>,
                            <span
                                class="{{$project->isUserCanUpdate($user) ? 'text-success' : 'text-danger'}}"
                            >update</span>)
                            <a href="{{ route('projects.user_access.edit', [$project, $user]) }}">Change access</a>
                        </p>
                        <hr>
                    @endforeach

                    <div class="col-md-8">
                        <a href="{{route('projects.show', $project)}}" class="btn btn-primary">
                            Back to project
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection