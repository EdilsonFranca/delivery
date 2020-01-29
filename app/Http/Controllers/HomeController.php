<?php

namespace App\Http\Controllers;

use Request;
use App\Produto;
use App\Categoria;
class HomeController extends Controller{

    public function index(){
      $produtos=Produto::whereNotNull('preco_promocao')->get();
      return view('home')->with('produtos',$produtos)->with('categorias',Categoria::all());
    }
    
    public function busca_por_categoria(){
        $categoria = Request::route('id');
        $produtos=Produto::where('categoria_id',$categoria)->get();
        $categoria_selecionada =Categoria::find($categoria);
        if(empty($produtos))  return "Esse produto não existe";  
        return view('home')->with('produtos',$produtos)->with('categorias',Categoria::all())->with('categoria_selecionada',$categoria_selecionada);
    }
}
