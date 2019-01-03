<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' 	      => 'required | min:3 | max:100',
            'number'      => 'required | numeric',
            'category'    => 'required',
            'description' => 'min:3 | max:1000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo NOME é de preenchimento obrigatório.',
            'name.min' => 'O campo NOME deve ter no mínimo três caracteres.',
            'name.max' => 'O campo NOME deve ter no máximo cem caracteres.',
            'number.required' => 'O campo NÚMERO é de preenchimento obrigatório.',
            'number.numeric' => 'O campo NÚMERO deve conter apenas números.',
            'category.required' => 'O campo CATEGORIA é de preenchimento obrigatório.',
            'description.min' => 'O campo DESCRIÇÃO deve ter no mínimo três caracteres.',
            'description.max' => 'O campo DESCRIÇÃO deve ter no máximo mil caracteres.'
        ];
    }
}
