<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputProductRequest extends FormRequest
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
            'product_id'    => 'required|numeric',
            'quantity'      => 'required|numeric',
            'input_date'    => 'required|date_format:Y-m-d H:i:s',

        ];
    }

    public function messages()
    {
        return [  
            'product_id.required'       =>  'El campo producto es obligatorio.',
            'product_id.numeric'        =>  'El campo producto debe ser un número.',
            'quantity.required'         =>  'El campo cantidad es obligatorio.',
            'quantity.numeric'          =>  'El campo cantidad debe ser un número.',
            'input_date.required'       =>  'El campo fecha es obligatorio.',
            'input_date.date_format'    =>  'El campo fecha no corresponde con el formato de fecha Y-m-d H:i:s.',
     
        ];
    }
}
