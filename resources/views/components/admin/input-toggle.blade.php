<label class="form-check form-switch">
    <input type="hidden" name="{{ $name }}" value="0">
    <input {{ $attributes->merge(['class' => 'form-check-input']) }} name="{{ $name }}"
           type="checkbox" value="1" @checked($checked)/>

    <span class="form-check-label">{{ __($label) }}</span>
    <x-input-error :messages="$errors->get(__($name))" class="mt-2" />
</label>
