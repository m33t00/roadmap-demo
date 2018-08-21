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
                <h4>
                    Events
                </h4>
            </div>
        </div>
    </div>
</div>
@endsection