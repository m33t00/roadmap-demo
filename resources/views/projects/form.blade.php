<form
        class="form-horizontal"
        method="POST"
        action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}"
>
    @if(isset($project))
        <input type="hidden" name="_method" value="PATCH">
    @endif

    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title" class="col-md-4 control-label">Title</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control" name="title" value="{{ $project->title ?? old('title') }}" required autofocus>

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="description" class="col-md-4 control-label">Description</label>

        <div class="col-md-6">
            <textarea
                    id="description"
                    class="form-control"
                    name="description"
                    rows=6
                    required
            >{{ $project->description ?? old('description') }}</textarea>

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                {{ isset($project) ? "Save" : "Create" }}
            </button>
        </div>
    </div>
</form>