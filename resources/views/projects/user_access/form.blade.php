<form
    method="POSt"
    action="{{ route('projects.user_access.update', [$project, $user]) }}"
    class="form-horizontal"
>
    {{ csrf_field() }}
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input
                        type="checkbox"
                        name="can_read"
                        {{ $project->isUserCanRead($user) ? 'checked' : '' }}
                    >
                    Can read project {{ $project->title }}
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input
                            type="checkbox"
                            name="can_update"
                            {{ $project->isUserCanUpdate($user) ? 'checked' : '' }}
                    >
                    Can update project {{ $project->title }}
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                {{ "Save" }}
            </button>
        </div>
    </div>
</form>