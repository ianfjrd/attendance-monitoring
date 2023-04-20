<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "name"=>'bail|required',
            'email'=>'bail|required|email',
            'password'=>'bail|required',
            'image' => 'bail|nullable|image',
            'age' => 'bail|required|numeric',
            'department'=>'bail|required',
            'phone_number'=>'bail|required|numeric|digits:11',
            'address'=>'bail|required',
            'valid_id_number'=>'bail|required',
            'role'=>'bail|required',
        ];
    }
}