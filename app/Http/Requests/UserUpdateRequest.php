<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //Por defecto viene en false!!
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|between:4,50','email' => 'required|between:15,150' , 'password' => 'sometimes|required|between:4,60'
        ];
    }
}
