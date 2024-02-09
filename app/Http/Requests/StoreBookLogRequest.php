<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookLogRequest extends FormRequest
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
            'book_id'     => 'int|required|exists:books,id',
            'user_id'     => 'int|required|exists:users,id',
            'date_start'  => 'date|required|date_format:Y-m-d H:i',
            'date_end'    => 'date|nullable',
            'planing_end' => 'date|nullable|date_format:Y-m-d H:i',
        ];
    }
}
