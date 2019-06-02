<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'email' => 'required|unique:users|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed',
//            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'type' => 'required'
        ];
    }
}
