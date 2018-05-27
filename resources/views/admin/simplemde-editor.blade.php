<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <textarea name="{{$name}}" class="CodeMirror-scroll">{{ old($column, $value) }}</textarea>
        <textarea  class="CodeMirror-scrolla form-control">图上传专用框</textarea>

    </div>
</div>