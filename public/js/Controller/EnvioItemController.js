class EnvioItemController{
    constructor(endereco,usuario){
        this._tdValorTotalValor = document.querySelector('.td-valor-total-valor');
        this._sacolaItens = document.querySelectorAll('.sacola-table .tr-item');
        this.endereco=endereco;
        this.usuario=usuario;
        this.getRadioValorFormaDePagamento();
        this._mensagem = new Mensagem();
        this._mensagemView = new MensagemView(document.querySelector('#mensagemView'));
        this._mensagemView.update(this._mensagem);
    }

    fazerPedidoWhatsapp(){
        let pedido='Ola segue o meu Pedido  ';
        let formaDePagamento =  this.getRadioValorFormaDePagamento('forma-de-pagamento');
        let troco='';
        formaDePagamento=='dinheiro'? troco =' troco para '+this.getRadioValorFormaDePagamento('troco'):'';
        this._sacolaItens.forEach(myFunction);
           function myFunction(item) {
              pedido+=item.children[2].textContent+' '+item.children[1].textContent+' '+item.children[3].textContent+' ,';
           }
        let valor = this._tdValorTotalValor.textContent;
        location.href='https://web.whatsapp.com/send?phone=5511946279867&text='+pedido+' valor total = '+valor+' '+' na '+this.endereco+'  para '+this.usuario+' pagamento no '+formaDePagamento+troco; 
    }
   finalizarCompra(){
      if(document.querySelector('.nav-link-menu-sacola > span').textContent < 1 ){
         this._mensagem.texto = 'Sacola vazia !!';
         this._mensagemView.update(this._mensagem);
      }else if (!document.querySelector('.usuario')) { 
         location.href="/login";
      }else{
         $('#ExemploModalCentralizadoFormaDePagamento').modal('show');
      }
   }
     getRadioValorFormaDePagamento(name){
        let rads = document.getElementsByName(name);
        for(var i = 0; i < rads.length; i++){
         if(rads[i].checked){
            return rads[i].value;
         }
        } 
        return;
       }

}