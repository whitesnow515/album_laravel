<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::file($name, array_merge(['class' => 'form-control-file'], $attributes)) }}
</div>