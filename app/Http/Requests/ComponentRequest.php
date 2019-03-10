<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponentRequest extends FormRequest
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
            'name'      => 'required|min:5',
            'info'     => 'required',
            'type'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     =>  'El :attribute es requerido',
            'name.min'          =>  'El :attribute debe tener al menos 3 caracteres',
            'info.required'    =>  'El :attribute es requerido',
            'type.required'      =>  'El :attribute es requerido'
        ];
    }
    public function attributes()
    {
        return [
            'name'      => 'nombre del componente',
            'info'      => 'descripccion del componente',
            'type'      => 'tipo del componente'
        ];
    }
}
