<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest{

    public function authorize(){
        return true;
    }

  
    public function rules(){
        return [
            'nome' => 'required|max:100',
            'descricao' => 'required|max:255',
            'preco' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
    }

    public function messages(){
        return [
             'required' => 'o campo :attribute  não pode ser vazio.',
        ];
        }
}
