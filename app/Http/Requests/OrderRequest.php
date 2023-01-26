<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'product_id'    =>  'required|numeric',
            'quantity'      =>  'required|numeric',
            'description'   =>  'nullable'
        ];
    }
 

    public function messages()
    {
        return [  
            'product_id.required'          =>  'El campo producto es obligatorio.',
            'quantity.required'          =>  'El campo cantidad es obligatorio.',
            'description.required'          =>  'El campo descripción es obligatorio.',
            'quantity.numeric'   =>  'El campo cantidad debe ser numerico',

        ];
    }
}


   