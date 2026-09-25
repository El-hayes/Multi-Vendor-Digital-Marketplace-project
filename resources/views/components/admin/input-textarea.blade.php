<div class="mb-3 mb-0">
    <label class="form-label">{{ __($label) }}</label>
    <textarea rows="5" {{ $attributes->merge(['class' => 'form-control']) }}
        placeholder="{{ __($placeholder) }}" name="{{ $name }}">
        {{ $value }}
    </textarea>
    <x-input-error :messages="$errors->get(__($name))" class="mt-2" />

</div>
