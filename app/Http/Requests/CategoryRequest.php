<?php

namespace App\Http\Requests;


class CategoryRequest extends BaseRequest
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
                    'title' => 'required|string|min:3|unique:categories'
                ];
            }
            case 'PUT'; {

                return [
                    'title' => 'string|min:3|unique:categories,id' . $this->id
                ];

            }
        }
    }
}
