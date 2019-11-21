<label class="{{ $class ?? null }}">
    <span>{{ $label ?? $textarea ?? '' ?? "ERRO" }}</span>
    {!! Form::textarea($textarea ?? '', $value ?? null, $attributes ?? []) !!}
</label>