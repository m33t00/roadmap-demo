@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Event types
            </div>
            <div class="panel-body">
                @foreach($event_types as $event_type)
                    <p>{{ $event_type->title }}</p>
                    <hr>
                @endforeach

                <div class="col-md-8">
                    <a href="{{ route('event_types.create') }}" class="btn btn-primary">New event type</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection