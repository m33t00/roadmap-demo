@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User action logs
                </div>
                <div class="panel-body">
                    @foreach($logRecords as $record)
                        <p>
                            {{ $record->created_at }}
                            <strong>{{ $record->user->email }}</strong>
                        </p>
                        <p>
                            {!! $record->diff_text !!}
                        </p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection