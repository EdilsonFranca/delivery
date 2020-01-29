@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="carouselExampleFade" class="carousel slide carousel-fade w-100" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('banner-slider/burgers-banner.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('banner-slider/pizza-banner.jpg') }}" class="d-block w-100" alt="..." width="100%">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div>
        <hr class="featurette-divider">
        <p class="filtro">
            @foreach ($categorias as $categoria)
            <a class="ml-2" href="busca-categoria/{{$categoria->id}}">{{$categoria->nome}} »\</a>
            @endforeach
        </p>
        <span class="promocoes-de-hoje">
            <span class="linha"></span>
            <span class="linha-2 ml-2">{{ $categoria_selecionada->nome ?? 'Promoções de hoje'}}</span>
        </span>
        <!-- inicio modal quantidade de produto-->
        <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="modal-quantidade-de-produto">
                </div>
            </div>
        </div>
        <!-- fim modal-->
        <!-- inicio modal forma de pagamentos-->
        <div class="modal fade" id="ExemploModalCentralizadoFormaDePagamento" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog row" role="document">
                <div class="modal-content col-12">
                    <div id="modal-header" class="text-center  text-secondary h5">Forma de Pagamento</div>
                    <div id="modal-body" class="row">
                        <div class="col-6">
                            <label class="col-9" for="dinheiro">Dinheiro
                              <svg width="70px" height="70px" fill="#317d39">
                                 <use xlink:href="icon-svg/categorias.svg#forma-de-pagamento-dinheiro" />
                              </svg>
                            </label>
                            <input type="radio" name="forma-de-pagamento" value="dinheiro" id="dinheiro" checked>
                            <div class="troco">
                                <small>troco para</small><br>
                                <small>R$10 <input type="radio" name="troco" value="10"></small>
                                <small>R$20 <input type="radio" name="troco" value="20"></small>
                                <small>R$50 <input type="radio" name="troco" value="50" checked></small>
                                <small>R$100<input type="radio" name="troco" value="100"></small>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <label for="cartao-de-credito">Cartão <svg width="70px" height="70px">
                                    <use xlink:href="icon-svg/categorias.svg#cartao-de-credito" /></svg></label>
                            <input type="radio" name="forma-de-pagamento" value="cartão" id="cartao-de-credito">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn  btn-outline-primary  col-12"
                            onclick="envioItemController.fazerPedidoWhatsapp()">Fazer pedido</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim modal-->
        <section class="container-fluid body-conteiner">
            <div class="row">
                <div class="col-sm-9 cardapio">
                    <div class="row">
                        @foreach ($produtos as $produto)
                        <div class="col-sm-6 cardapio-item produto">
                            <div class="cardapio-item-body row">
                                <div class="col-4">
                                    <img src="{{ $produto->photo }}" class="cardapio-div-body-img">
                                </div>
                                <div class="col-8 descricao">
                                    <p id="nome-produto">{{ $produto->nome  }} </p>
                                    @if(!empty($produto->preco_promocao))
                                    <p> <span style="color:red" class=""><del>R$ {{ $produto->preco  }} </del></span>
                                    </p>
                                    <p> <span id="preco-produto">R$ {{ $produto->preco_promocao  }}</span></p>
                                    @else
                                    <p> <span id="preco-produto">R$ {{$produto->preco  }} </span></p>
                                    @endif
                                    <p><small class="text-muted">{{ $produto->descricao }} </small></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-3 sacola">
                    <div class="sacola-body formulario">
                    <div id="mensagemView" class="text-center" style="z-index:2"></div>
                        <h3 class="titulo-pedido text-center">Seu Pedido</h3>
                        <img src="{{asset('/icon/sacola.svg')}}" alt="" width="100%" height="100px">
                        <hr class="featurette-divider">
                        <table class="sacola-table" style="width:100%">
                            <thead>
                                @if(session()->has('sacola.carr'))
                                @foreach (array_chunk(session()->get('sacola.carr'),3) as $item)
                                <tr class="col-12 tr-item" style="width:100%">
                                    <td>{{substr($item[0],0,20)}}</td>
                                    <td hidden>{{$item[0]}}</td>
                                    <td class="td_QTD">{{$item[1]}} </td>
                                    <td class="td_valores">{{$item[2]}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </thead>
                            <tbody id="sacola-table-id">
                            </tbody>
                            <tfoot>
                                <tr class="tr-taxa-de-entrega">
                                    <td class="td-taxa-de-entregan">Taxa de entrega</td>
                                    <td></td>
                                    <td class="td-taxa-de-entrega-valor">R$ 4,00</td>
                                </tr>
                                <tr class="tr-sub-valor-total">
                                    <td class="td-sub-valor-total">sub Valor</td>
                                    <td></td>
                                    <td class="td-sub-valor-total-valor"></td>
                                </tr>
                                <tr class="tr-valor-total">
                                    <td class="td-valor-total">Valor Total</td>
                                    <td></td>
                                    <td class="td-valor-total-valor"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <button class="btn btn-primary btn-block" onclick="envioItemController.finalizarCompra()">
                            Finalizar Compra
                        </button>
                        <small class="limpa-sacola">Limpar Sacola</small>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
</script>
<script src="js/MoneyHelper.js"></script>
<script src="js/models/Modal.js"></script>
<script src="js/Controller/ModalController.js"></script>
<script src="js/Controller/EnvioItemController.js"></script>
<script src="js/view/ModalView.js"></script>
<script src="js/models/Item.js"></script>
<script src="js/Controller/ItemController.js"></script>
<script src="js/models/ListaDeItens.js"></script>
<script src="js/view/ItemView.js"></script>
<script src="js/home.js"></script>
<script src="js/models/Mensagem.js"></script>
<script src="js/view/MensagemView.js"></script>
<script>
let modalController = new ModalController();
let itemController = new ItemController();
itemController.atualizaSacola();
itemController.alteraValorTotal();
if (document.querySelector('.usuario')) {
    let usuario = document.querySelector('.usuario').textContent;
    let endereco = document.querySelector('.rua').textContent + '' + document.querySelector('.numero').textContent +
        '' + document.querySelector('.bairro').textContent;
    envioItemController = new EnvioItemController(endereco, usuario);
}else 
    envioItemController = new EnvioItemController();
</script>
@endsection