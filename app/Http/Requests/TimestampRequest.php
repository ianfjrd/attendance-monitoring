<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimestampRequest extends FormRequest
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
            'time_in' => 'bail|required|date',
            'break_in' => 'bail|date',
            'break_out' => 'bail|date',
            'time_out' => 'bail|date',
            'user_id' => 'bail|required|numeric|exists:users,id'
        ];
    }
}
