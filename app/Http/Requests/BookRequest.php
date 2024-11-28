<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:1000',
            'pages' => 'nullable|integer',
        ];
    }

    /**
     * Get custom error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'The book title is required.',
            'author_id.required' => 'The author is required.',
            'author_id.exists' => 'The selected author does not exist.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'description.required' => 'The description is required.',
            'description.max' => 'The description may not be greater than 1000 characters.',
            'pages.required' => 'The pages is required.',
            'pages.integer' => 'The pages must be an integer.',
        ];
    }
}
