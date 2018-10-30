<?php

namespace App\Http\Requests;


class UserFormRequest extends BaseRequest
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
        switch ($this->method()) {
            case 'POST': {
                return [
                    'name' => 'required|string|unique:users',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|string|min:6|max:10',
                ];
            }
            case 'PUT'; {
                return [
                    'name' => 'string|unique:users,id' . $this->id,
                    'email' => 'email|unique:users',
                    'password' => 'string|min:6|max:10',
                ];

            }
        }

    }
}
