<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'major' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255','unique:students'],
            'phone' => ['min:11','numeric'],
            'address' => ['max:255'],
        ];
    }
}
