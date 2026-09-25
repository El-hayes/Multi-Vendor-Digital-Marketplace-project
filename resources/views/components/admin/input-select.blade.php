<div class="mb-3">
    <label class="form-label">{{ __($label) }}</label>
    <select {{ $attributes->merge(['class' => 'form-control form-select']) }} name="{{ $name }}">
        <option value="">{{ __('Select') }}</option>
        {{ $slot }}
    </select>
</div>
