<?php

namespace Modules\Teachers\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeachersRequest extends FormRequest
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
        // $courseId=$this->route()->course;
        // $uniqueRule='unique:teachers,code';
        // if($courseId){
        //     $uniqueRule.=','.$courseId;
        // }
        $rules=[
            'name'=>'required|max:255',
            'slug'=>'required|max:255',
            'description'=>'required',
            'image'=>'required|max:255',
            'epx'=>'required',
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => __('Courses::validation.required'),
            // 'email' =>__('Courses::validation.email'),
            // 'unique' =>__('Courses::validation.unique'),
            'min' => __('Teachers::validation.min'),
            'integer' =>__('Teachers::vlidation.integer'),
            'max' =>__('Teachers::validation.max'),
        ];

    }
    public function attributes()
    {
        return __('Courses::validation.attributes');
    }
}
