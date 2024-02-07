<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CancellationPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "partner_name" => "required|string|max:255",
            "invoice_type" => "required|string|max:255",
            "operation_type" => "required|string|max:255",
            "old_invoice" => "required|regex:/^[0-9]+$/|string",
            "old_invoice_date" => "required|date",
            "old_material" => "required|string",
            "old_price" => "required|decimal:2|gte:0",
            "client" => "required|string|max:255",
            "new_invoice" => "nullable|regex:/^[0-9]+$/|string",
            "new_invoice_date" => "nullable|date",
            "new_material" => "nullable|string",
            "new_price" => "nullable|decimal:2|gte:0",
            "reason" => "required|string|max:255",
            "authorized_by" => "required|string|max:255",
            "is_include_selected" => "required|boolean",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'old_invoice.regex' => 'El campo solo debe contener números enteros.',
            'new_invoice.regex' => 'El campo solo debe contener números enteros.',
            'operation_type.required' => 'Campo requerido.',
        ];
    }
}
