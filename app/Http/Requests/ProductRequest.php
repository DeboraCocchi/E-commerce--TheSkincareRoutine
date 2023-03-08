<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
           'name'=>'required|min:3|max:255',
           'price'=>'required|numeric',
            'image'=>'required',
           'code'=>'required|unique:products,code|min:8|max:8',
           'description'=>'max:500'
        ];
    }

    public function messages()
    {
        return [
           'name.required'=>'Il nome prodotto è un campo obbligatorio',
           'name.min'=>'Il nome prodotto deve contenere almeno :min caratteri',
           'name.max'=>'Il nome prodotto può contenere al massimo :max caratteri',
           'price.required'=>'Il prezzo è un campo obbligatorio',
           'price.numeric'=>'Il prezzo è un campo numerico',
            'image.required'=>'L\'immagine è un campo obbligatorio',
           'code.required'=>'Il codice prodotto è un campo obbligatorio',
           'code.unique'=>'Il codice prodotto deve essere univoco',
           'code.min'=>'Il codice prodotto deve contenere  :min caratteri',
           'code.max'=>'Il codice prodotto deve contenere  :max caratteri',
           'descriptionmax'=>'La descrizione del prodotto può contenere al massimo :max caratteri'
        ];
    }
}
