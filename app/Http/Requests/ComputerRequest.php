<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerRequest extends FormRequest
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
            'model'         => 'required|min:5',
            'price'      => 'required|min:2|numeric',
            'description'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'model.required'=> 'El :attribute es necesario.',
            'model.min' => 'El :attribute debe tener al menos 5 caracteres.',
            'price.required' => 'La :attribute es necesario.',
            'price.min' => 'Debe introducir una :attribute válido.',
            'price.numeric' => 'Debe introducir un valor numérico.',
            'description.required'=> 'La :attribute es necesaria.'
        ];
    }

    public function attributes()
    {
        return [
            'model'     => 'modelo del ordenador',
            'price' => 'precio del ordenador',
            'description' => 'descripción del ordenador'
        ];
    }
}
