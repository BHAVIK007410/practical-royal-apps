<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'title' => 'required|min:5|max:50',
            'description' => 'required|min:15|max:100',
            'isbn' => 'required|min:5|max:20',
            'author' => 'required',
            'releasedate' => 'required',
            'format' => 'required|min:5|max:20',
            'pages' => 'required|integer',
        ];
    }
}
