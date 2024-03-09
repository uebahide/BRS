<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            "title" => 'required|string|max:255',
            "authors" => 'required|string|max:255',
            "description" => 'nullable',
            "released_at" => 'nullable|date_format:Y-m-d',
            "cover_image" => 'nullable|max:255',
            "pages" => 'nullable|integer',
            "language_code" => 'nullable|max:3|string',
            "isbn" => 'nullable|string|size:13|unique:books,isbn',
            "in_stock" => 'nullable|integer'
        ];
    }
}
