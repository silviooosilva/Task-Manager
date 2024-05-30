<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class taskStoreRequest extends FormRequest
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
            'task_title' => 'required|string|max:255',
            'task_description' => 'required|string',
            'task_status' => 'required|string',
            'owner' => 'requrid|string'
        ];
    }
}
