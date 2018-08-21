@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row roadmap">
        <div class="roadmap-paginate">
            <a
                href="{{ route('roadmap', [$previous->year, $previous->month]) }}"
                class="roadmap-paginate previous"
            >
                &lt; {{$previous->format('M Y')}}
            </a>
            <a
                href="{{ route('roadmap', [$next->year, $next->month]) }}"
                class="roadmap-paginate next"
            >
                {{$next->format('M Y')}} &gt;
            </a>
        </div>
        <table class="table roadmap-table">
            <thead>
                <th>Project title</th>
                @foreach(range(1, $endDate->weekOfMonth) as $week)
                    <th>Week #{{$week}}</th>
                @endforeach
            </thead>
            <tbody>
                @foreach($projects as $project)
                    @can('view', $project)
                        <tr>
                            <td class="roadmap-project-title">
                                @can('update', $project)
                                    <a href="{{route('projects.events.index', $project)}}" class="project-title">
                                        {{$project->title}}
                                    </a>
                                    <br />
                                    <br />
                                    <a href="{{route('projects.events.create', $project)}}" class="add-event-link">
                                        Add event
                                    </a>
                                @else
                                    {{$project->title}}
                                @endcan
                            </td>
                            @include('home.roadmap-single-project', compact('project'))
                        </tr>
                    @endcan
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
