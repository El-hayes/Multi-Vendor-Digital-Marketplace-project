<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class KycVerificationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

                'document_type' => ['required', 'string', 'in:nid,passport'],
                'document_number' => ['required', 'string', 'unique:kyc_verifications,document_number'],
                'documents' => ['required', 'array', 'min:1'],
                'documents.*' => [
                    'required',
                    'file',
                    'mimes:jpg,jpeg,png,pdf',
                    'max:5000']


        ];
    }


    public function messages(): array
    {
        return [
            'document_number.unique' => 'This document number is already registered.',
            'documents.*.mimes' => 'Each document must be a JPG, JPEG, PNG, or PDF file.',
            'documents.*.max' => 'Maximum upload file size is 5MB.',
            'documents.*.required' => 'The document is required.',

        ];
    }


}
