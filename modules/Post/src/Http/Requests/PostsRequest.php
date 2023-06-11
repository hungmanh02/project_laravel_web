<?php

namespace Modules\Post\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
        $rules=[
            'title'=>'required|max:255',
            'slug'=>'required|max:255',
            'content'=>'required',
            'thumbnail'=>'required|max:255',
            'exceprt'=>'required',
            'post_id' =>['required','integer',function($attribute,$value,$fail){
                if($value==0){
                    $fail(__('Post::validation.select'));
                }
            }]
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => __('Post::validation.required'),
            'email' =>__('Post::validation.email'),
            'unique' =>__('Post::validation.unique'),
            'min' => __('Post::validation.min'),
            'integer' =>__('Post::vlidation.integer'),
            'max' =>__('Post::validation.max'),
        ];

    }
    public function attributes()
    {
        return __('Post::validation.attributes');
    }
}
