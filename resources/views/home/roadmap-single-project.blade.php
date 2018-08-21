@foreach($project->getEventsInMonthGroupedByWeek($startDate) as $week => $events)
    <td class="events-cell {{count($events) ? 'has-events' : ''}}">
        @if(!count($events))
            <p>No events</p>
        @else
            <ul class="list-unstyled">
                @foreach($events as $event)
                    <li>
                        <a href="{{route('projects.events.show', [$project, $event])}}">
                            {{$event->eventType->title}} ({{$event->date->toDateString()}})
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </td>
@endforeach
