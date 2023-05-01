<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=>'bail|required',
            'email'=>'bail|required|email|unique:users',
            'password'=>'bail|required',
            'image' => 'bail|nullable|image',
            'age' => 'bail|required|numeric',
            'department'=>'bail|required',
            'phone_number'=>'bail|required|numeric|digits:11',
            'address'=>'bail|required',
            'valid_id_number'=>'bail|required',
            'role'=>'bail|required',
            'workdays'=>'bail|required',
            'time_in_user'=>'bail|required',
            'break_duration'=>'bail|required',
            'time_out_user'=>'bail|required',
        ];
    }
}
