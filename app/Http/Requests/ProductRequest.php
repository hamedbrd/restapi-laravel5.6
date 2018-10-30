<?php

namespace App\Http\Requests;


class ProductRequest extends BaseRequest
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
                    'name' => 'required|string|unique:products',
                    'price' => 'required|integer',
                    'cat_ids' => 'required|array|exists:categories,id'
                ];
            }
            case 'PUT'; {

                return [
                    'name' => 'string|unique:products,id' . $this->id,
                    'price' => 'integer',
                    'cat_ids' => 'array'
                ];

            }
        }
    }
}
