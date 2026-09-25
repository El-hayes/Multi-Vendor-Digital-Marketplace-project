<div class="mb-3">
    <label class="form-label">{{ __($label) }}</label>
    <input type="{{ $type }}" value="{{ $value }}" name="{{ $name }}"
        {{ $attributes }}
        {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}
         placeholder="{{ __($placeholder) }}" />
    <x-input-error :messages="$errors->get(__($name))" class="mt-2" />
</div>
