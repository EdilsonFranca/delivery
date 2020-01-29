<?php namespace  App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\ProdutosRequest;
use App\Produto;
use App\Categoria;
use Request;


class ProdutoController  extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }
 
    public function listar(){
    $produtos=Produto::all();
    return view('produto.listagem-de-produtos')->with('produtos',$produtos);
  }


   public function novo(){
   return view('layout.formulario-produto')->with('categorias',Categoria::all());
   }

   public function adiciona(ProdutosRequest $request){
       $produto = new Produto(Request::all());
        if ($request->has('photo')) {
            $image = $request->file('photo');
            $name = str_slug($request->input('nome')).'_'.time();
            $folder = 'images/';
            $filePath = $folder.$name.'.'.$image->getClientOriginalExtension();
            $request->photo->move(public_path('images'),$filePath);
            $produto->photo=$filePath;
        }
    $produto->save();
    return redirect()->action('ProdutoController@listar');
   }
   
   public function adicionaPromocao(){
    $id=Request::input('id');
    $valorPromocao=Request::input('valor-promocao');
    $produto = Produto::find($id);
    $produto->preco_promocao= $valorPromocao;
    $produto->save();
    return redirect()->action('ProdutoController@listar');
  }

  public function removePromocao(){
    $id=Request::input('id');
    $produto = Produto::find($id);
    $produto->preco_promocao=NULL;
    $produto->save();
    return redirect()->action('ProdutoController@listar');
  }


   public function adicionaCategoria(){
     $categoria = new Categoria(Request::all());
     $categoria->save();
    return redirect()->action('ProdutoController@novo');
}
   
   public function remove($id){
    $produto = Produto::find($id);
    $produto->delete();
    return redirect()->action('ProdutoController@listar');
    }

    public function removeCategoria(){
        $categoria = Categoria::find(Request::input('categoria_id'));
        if( count($categoria->produtos) == 0){
            $categoria->delete();
            return redirect()->action('ProdutoController@novo');
        }else 
            return view('layout.formulario-produto')->with('msn','precisa excluir todos produtos com esta categoria')->with('categorias',Categoria::all())->with('tipo', 'danger');
        }
   
        public function cadastrar(){
            $cep=Request::input('cep');
            DB::insert('insert into tbAreaDeEntrega values (null, ?)', array($cep));
         return view('layout.formulario-produto')->with('categorias',Categoria::all())->with('msn', 'CEP cadastrado com sucesso !!!')->with('tipo', 'success');   
      }
}
