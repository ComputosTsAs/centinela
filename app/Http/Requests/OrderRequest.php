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
    // public function rules()
    // {
    //     return [
    //         'product_id'    =>  'required|numeric',
    //         'quantity'      =>  'required|numeric',
    //         'description'   =>  'nullable'
    //     ];
    // }
      public function rules()
    {
        return [
            'admission_date'    =>  'required|date_format:Y-m-d H:i:s',
            'user_id'   =>  'required',
            'description'    =>  'required',
            'status_id'      =>  'required',
            'delivery_date'      =>  'nullable|date_format:Y-m-d H:i:s',
            'user_id_deliver'   =>  'nullable',
            'who_takes'    =>  'nullable',
           
        ];
    }

    public function messages()
    {
        return [  
            'user_id.required'          =>  'El campo solicitante es obligatorio.',
            'status_id.required'          =>  'El campo estado es obligatorio.',
            'description.required'          =>  'El campo descripción es obligatorio.',
            'user_id.required'          =>  'El campo solicitante es obligatorio.',
            'user_id_deliver.required'          =>  'El campo entregó es obligatorio.',
            'who_takes.required'          =>  'El campo retiró es obligatorio.',
            'delivery_date.date_format'   =>  'El campo fecha de entrega no corresponde con el formato de fecha Y-m-d H:i:s.',
            'admission_date.required'      =>  'El campo fecha es obligatorio.',
            'admission_date.date_format'   =>  'El campo fecha no corresponde con el formato de fecha Y-m-d H:i:s.',

        ];
    }
}
