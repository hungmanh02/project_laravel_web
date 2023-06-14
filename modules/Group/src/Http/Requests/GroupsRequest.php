<?php

namespace Modules\Group\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupsRequest extends FormRequest
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
            'name'=>'required|max:255',

        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => __('Option::validation.required'),
            'max' =>__('Option::validation.max'),
        ];

    }
    public function attributes()
    {
        return __('Group::validation.attributes');
    }
}
