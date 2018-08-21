<form
        method="POST"
        action="{{
            isset($event) ? route('projects.events.update', [$project, $event]) : route('projects.events.store', $project)
        }}"
        class="form-horizontal"
>
    @if(isset($event))
        <input type="hidden" name="_method" value="PATCH">
    @endif

    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('event_type_id') ? ' has-error' : '' }}">
        <label for="event_type_id" class="col-md-4 control-label">Event type</label>
        <div class="col-md-6">
            <select name="event_type_id" class="form-control" id="event_type_id">
                @foreach(\App\Models\EventType::all() as $event_type)
                    <option value="{{ $event_type->id }}">{{ $event_type->title }}</option>
                @endforeach
            </select>

            @if ($errors->has('event_type_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('event_type_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
        <label for="date" class="col-md-4 control-label">Event date</label>
        <div class="col-md-6">
            <input
                    type="date"
                    name="date"
                    id="date"
                    class="form-control"
                    value="{{  old('date') ?: (isset($event) ? $event->date->toDateString() : '')}}"
            >

            @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
        <label for="short_description" class="col-md-4 control-label">Summary</label>

        <div class="col-md-6">
            <input
                    id="title"
                    type="text"
                    class="form-control"
                    name="short_description"
                    value="{{ $event->short_description ?? old('short_description') }}"
                    id="short_description"
                    required
            >

            @if ($errors->has('short_description'))
                <span class="help-block">
                    <strong>{{ $errors->first('short_description') }}</strong>
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
            >{{ $event->description ?? old('description') }}</textarea>

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    @if (isset($event))
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="delete" {{ old('delete') ? 'checked' : '' }}>
                        Delete event
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('last_update_reason') ? ' has-error' : '' }}">
            <label for="last_update_reason" class="col-md-4 control-label">Update reason</label>

            <div class="col-md-6">
                <input
                    type="text"
                    class="form-control"
                    name="last_update_reason"
                    id="last_update_reason"
                    value="{{$event->last_update_reason ?? old('last_update_reason')}}"
                >
                @if ($errors->has('last_update_reason'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_update_reason') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    @endif

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                {{ isset($event) ? "Save" : "Create" }}
            </button>
        </div>
    </div>
</form>