<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Project;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param   Project   $project
     * @return  \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return view(
            'events.index',
            compact('project')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param   Project   $project
     * @return  \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view(
            'events.create',
            compact('project')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventRequest     $request
     * @param  Project          $project
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request, Project $project)
    {
        $project->events()->create($request->all());

        return redirect(
            route('projects.events.index', $project)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event    $event
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Event $event)
    {
        return view(
            'events.show',
            compact('project', 'event')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   Project           $project
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Event $event)
    {
        return view(
            'events.edit',
            compact('project', 'event')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EventRequest $request
     * @param  \App\Models\Event $event
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(EventRequest $request, Project $project, Event $event)
    {
        if ($request->has('delete')) {
            $event->update(
                ['last_update_reason' => $request->get('last_update_reason')]
            );
            $event->delete();
            return redirect(
                route('projects.events.index', $project)
            );
        }

        $event->update($request->all());

        return redirect(
            route('projects.events.show', [$project, $event])
        );
    }
}
