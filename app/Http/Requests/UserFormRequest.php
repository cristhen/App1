<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
          'name'         =>  'required|max:100',
          'email'        =>  'required|email|unique:users',
          'password'     =>  'required|confirmed',
          'role'         =>  'required|in:0,1,2',
          'consortiums_id' => 'required',
          'uf_number'    => 'required'
        ];
    }
}
