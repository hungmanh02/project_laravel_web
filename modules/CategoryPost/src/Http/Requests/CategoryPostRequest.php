<?php

namespace Modules\CategoryPost\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'required|max:255',
            'slug' =>'required|max:255',
            'parent_id' =>'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('Category::validation.required'),
            'integer' =>__('Category::vlidation.integer'),
            'max' =>__('Category::validation.max'),
        ];

    }
    public function attributes()
    {
        return [
            'name' =>__('Category::validation.attributes.name'),
            'slug' =>__('Category::validation.attributes.slug'),
            'parent_id' =>__('Category::validation.attributes.parent_id'),
        ];
    }
}