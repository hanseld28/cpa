<label class="{{ $class ?? null }}">
    <span>{{ $label ?? $input ?? "ERRO" }}</span>
    {!! Form::date($input, $value ?? null, $attributes) !!}
</label>