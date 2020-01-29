@extends('layout.principal')
@section('conteudo')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
<div class="col-8">
    <form class="col-md-12 formulario-adiciona-produtos" action="/produtos/adiciona" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <h3 class="form cols-md-12 text-center">Cadastro de Produtos</h3>
        <div class="form cols-md-12">
            <div class="form-group col-md-12">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" value="{{ old('nome') }}" name="nome">
            </div>
            <div class="form-group col-md-12">
                <label for="inputPreco">Preço</label>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">R$</div>
                    </div>
                    <input type="text" class="form-control" id="inputPreco" value="{{ old('preco') }}" name="preco">
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="inputcategoria">Categoria</label>
                <select class="form-control" id="inputcategoria" value="{{ old('categoria_id') }}" name="categoria_id">
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="inputfoto">Foto do Produto</label>
                <input type="file" class="form-control" value="{{ old('photo') }}" name="photo" id="inputfoto">
            </div>
            <div class="form-group col-md-12">
                <label for="textarea-descricao">Descrição</label>
                <textarea class="form-control" id="textarea-descricao" value="{{ old('descricao') }}"  name="descricao"></textarea>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
            </div>
        </div>
     </form>
    </div>
    <div class="col-md-4">
         <p class="text-{{ $tipo ?? '' }}"><small> {{ $msn ?? '' }}</small></p>
        <form style="margin-top:100px" action="{{action('ProdutoController@removeCategoria')}}" method="POST" class="form-inline col-12">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <small>Remover Categoria</small>
            <select class="form-control col-9" id="" name="categoria_id">
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            </select>
            <button  type="submit" style="padding:1px; border-radius: 0 30px 30px 0;" class="col-3 bg-danger">
                <svg class="item‐icone-rodape" style=" width: 50px; height:32px;fill: #fff">
                    <use xlink:href="../icon-svg/categorias.svg#delete" />
                </svg>
            </button>
        </form>
        <form style="margin-top:50px" action="{{action('ProdutoController@adicionaCategoria')}}" method="POST" class="form-inline col-12">
             <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
             <small>Adicionar Categoria</small>
             <input type="text" class="form-control col-md-9" name="nome" required>
             <button style="border-radius: 0 30px 30px 0;" type="submit" class="btn btn-success col-3">adicionar</button> 
        </form>

        <form style="margin-top:50px" action="{{action('ProdutoController@cadastrar')}}"  method="POST" class="form-inline col-12">
             <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
             <small>Adicionar Aréa de entrega</small>
             <input type="text" class="form-cep form-control col-md-9" name="cep" required placeholder="digite o CEP">
             <button style="border-radius: 0 30px 30px 0;" type="submit" class="btn btn-success col-3">adicionar</button> 
        </form>
    </div>
</div>
</div>
@stop