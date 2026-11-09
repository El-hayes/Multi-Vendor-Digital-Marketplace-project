{{-- My custmized Dynamic frontend input component --}}
<div class="form_box">
    <label for="{{ $name }}" class="form-label mb-2 font-18 font-heading fw-600">{{ __($label) }} <span class="text-danger"> {{ $required }}</span></label>
    <input type="{{ $type }}" {{ $attributes->merge(['class' => 'common-input border']) }}
        name="{{ $name }}" value="{{ __($value) }}" placeholder="{{ __($placeholder) }}">
    <x-input-error :messages="$errors->get( __($name) )" class="mt-2" />
</div>
