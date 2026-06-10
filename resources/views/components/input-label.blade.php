@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label fw-500 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
