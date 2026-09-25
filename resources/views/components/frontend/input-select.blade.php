{{-- My custmized Dynamic frontend input Select component --}}

<div class="form_box">
    <label for="{{ $name }}" class="form-label mb-2 font-18 font-heading fw-600">{{ __($label) }}</label>
    <div>
        <select {{  $attributes->merge(["class" =>"common-input border"])}}
            name="{{ $name }}">
            <option value="">{{ __('select') }}</option>
           {{ $slot }}

        </select>
    </div>
</div>
