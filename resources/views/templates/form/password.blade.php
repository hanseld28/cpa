<label class="{{ $class ?? null }}">
    <span>{{ $input }}</span>
    {{!! Form::password($input, $attributes) !!}}
</label>