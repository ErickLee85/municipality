@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold py-2']) }}>
    {{ $value ?? $slot }}
</label>
