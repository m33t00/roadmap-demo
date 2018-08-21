@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Projects
            </div>
            <div class="panel-body">
                @foreach($projects as $project)
                    <h4>
                        @can('view', $project)
                            <a href="{{route('projects.show', $project)}}">{{$project->title}}</a>
                        @else
                            {{$project->title}}
                        @endcan
                    </h4>
                    @can('view', $project)
                        <p>{{$project->description}}</p>
                    @else
                        <p><em>(access denied)</em></p>
                    @endcan
                    <hr>
                @endforeach

                <div class="col-md-8">
                    <a href="{{route('projects.create')}}" class="btn btn-primary">
                        Create new project
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection