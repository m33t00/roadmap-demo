<form
        method="POST"
        action="{{ isset($event_type) ? route('event_types.update') : route('event_types.store') }}"
        class="form-horizontal"
>
    @if(isset($event_type))
        <input type="hidden" name="_method" value="PATCH">
    @endif

    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title" class="col-md-4 control-label">Title</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control" name="title" value="{{ $event_type->title ?? old('title') }}" required autofocus>

            @if ($errors->has('title'))
                <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                {{ isset($event_type) ? "Save" : "Create" }}
            </button>
        </div>
    </div>

</form>