<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectsRequest;
use App\Http\Requests\UserAccessRequest;
use App\Models\Project;
use App\Models\UserAccess;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectsRequest $request)
    {
        $project = Auth::user()->projects()->create($request->all());

        return redirect(
            route('projects.show', $project)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);
        return view(
            'projects.show',
            compact('project')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        return view(
            'projects.edit',
            compact('project')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectsRequest $request
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ProjectsRequest $request, Project $project)
    {
        $this->authorize('update', $project);
        $project->update($request->all());
        return redirect(
            route('projects.show', $project)
        );
    }

    /**
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function showUserAccess(Project $project)
    {
        $this->authorize('view', $project);

        $users = User::all()->filter(
            function (User $user) {
                return $user->id !== Auth::user()->id;
            }
        );

        return view(
            'projects.user_access.index',
            compact('users', 'project')
        );
    }

    /**
     * @param Project $project
     * @param User $user
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function editUserAccess(Project $project, User $user)
    {
        $this->authorize('update', $project);
        if ($this->isChangingSelfAccess($user)) {
            return redirect(
                route('projects.show', $project)
            );
        }

        return view(
            'projects.user_access.edit',
            compact('project', 'user')
        );
    }

    /**
     * @param Project $project
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateUserAccess(UserAccessRequest $request, Project $project, User $user)
    {
        $this->authorize('update', $project);
        if ($this->isChangingSelfAccess($user)) {
            return redirect(
                route('projects.show', $project)
            );
        }

        $accessParams = [
            UserAccess::CAN_READ => $request->has(UserAccess::CAN_READ),
            UserAccess::CAN_UPDATE => $request->has(UserAccess::CAN_UPDATE),
        ];

        $project->usersAccess()->syncWithoutDetaching([$user->id => $accessParams]);

        return redirect(
            route('projects.user_access.index', $project)
        );
    }

    private function isChangingSelfAccess(User $user)
    {
        return $user->id === Auth::user()->id;
    }

}
