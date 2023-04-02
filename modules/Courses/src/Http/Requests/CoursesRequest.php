<?php

namespace Modules\Courses\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
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
     $id=$this->route()->user;
        $rules=[
            'name'=>'required|max:255',
            'slug'=>'required|max:255',
            'detail'=>'required',
            'thumbnail'=>'required|max:255',
            'code'=>'required|max:255',
            'is_document'=>'required|integer',
            'supports'=>'required',
            'status'=>'required|integer',
            'teacher_id' =>['required','integer',function($attribute,$value,$fail){
                if($value==0){
                    $fail(__('Courses::validation.select'));
                }
            }],
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => __('Courses::validation.required'),
            'email' =>__('Courses::validation.email'),
            'unique' =>__('Courses::validation.unique'),
            'min' => __('Courses::validation.min'),
            'integer' =>__('Courses::vlidation.integer'),
            'max' =>__('Courses::validation.max'),
        ];

    }
    public function attributes()
    {
        return __('Courses::validation.attributes');
    }
}
