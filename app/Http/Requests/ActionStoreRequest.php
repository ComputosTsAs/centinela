<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActionStoreRequest extends FormRequest
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
            'name'  => 'required|max:191|unique:actions',
            'icon'  => 'max:191'
        ];
    }

    public function messages()
    {
        return [  
            'name.required' => 'El campo nombre es obligatorio.',
            'name.max'      => 'El campo nombre no debe contener más de 191 caracteres.',
            'name.unique'   => 'El valor del campo nombre ya está en uso.',
            'icon.max'      => 'El campo icono no debe contener más de 191 caracteres.'
        ];
    }
}