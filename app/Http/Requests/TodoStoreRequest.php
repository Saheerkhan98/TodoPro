<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'title' => 'required|string|max:255',
            'alertAt' => 'required|string',
            'isDone' => 'boolean'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'title.required' => 'A title is required',
    //         'title.string' => 'The title must be a string',
    //         'title.max' => 'The title may not be greater than 255 characters',
    //         'isDone.boolean' => 'The isDone field must be true or false'
    //     ];
    // }
}
