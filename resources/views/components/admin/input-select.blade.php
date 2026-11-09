<div class="mb-3">
    <label class="form-label">{{ __($label) }}</label>
    <select {{ $attributes->merge(['class' => 'form-control form-select']) }} name="{{ $name }}">
        <option disabled value="">{{ __('Select') }}</option>
        {{ $slot }}
    </select>
    <x-input-error :messages="$errors->get(__($name))" class="mt-2" />
</div>


