<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Book;

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
            "released_at" => 'nullable|date_format:Y-m-d|before:now',
            "cover_image" => 'nullable|max:255',
            "pages" => 'nullable|integer|min:1',
            "language_code" => 'nullable|max:3|string',
            "isbn" => ['nullable', 'string', 'size:13', Rule::unique(Book::class)->ignore($this->route('book'))],
            "in_stock" => 'nullable|integer|min:0',
            'genres' => 'required|array|min:1',
        ];
    }
}
