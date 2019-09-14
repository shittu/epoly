<?php

namespace Modules\Staff\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewStaffFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gender'=>'required',
            'religion'=>'required',
            'tribe'=>'required',
            'address'=>'required',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'phone'=>'required|unique:staff',
            'email'=>'required|email|unique:staff',
            'staffID'=>'required|unique:staff',
            'department'=>'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(admin()){
            return true;
        }
        return false;
    }
}
