class ModalController {
    constructor() {
        let $ = document.querySelector.bind(document);
        this._inputProdutos = document.querySelectorAll('.produto');
        this._inputNome = document.querySelectorAll('#nome-produto');
        this._inputQuantidade;
        this._inputValor = document.querySelectorAll('#preco-produto');
        this._modal = new Modal();
        this._modalView = new ModalView($('#modal-quantidade-de-produto'));
        this._modalView.updateModal(this._modal);
        this._btnAdicionar = $('.adiciona');
        this._btnRemover = $('.subtrai');
        this._buscaProdutos();
    }
     _buscaProdutos(){
         let atualizaModalLocal = this._modalView.updateModal.bind(this._modalView);
         let criarModalLocal = this._criaModal.bind(this._criaModal);
         let nomeLocal = this._inputNome;
         let quantidadeLocal = 1;
         let valorLocal = this._inputValor;
         this._inputProdutos.forEach(myFunction);
           function myFunction(produto,index) {
              produto.onclick = function() {
                atualizaModalLocal(criarModalLocal(nomeLocal[index],quantidadeLocal,valorLocal[index]));
                $('#ExemploModalCentralizado').modal('show');
             }
          }
      }
    
    _criaModal(inputNome,inputQuantidade,inputValor) {
         return new Modal(inputNome.textContent
                         ,MoneyHelper.moneyTextToFloat(inputValor.textContent)
                         ,inputQuantidade
                         ,MoneyHelper.moneyTextToFloat(inputValor.textContent))                    
       }

    adicionarQuantidade(nome,preco,precoTotal,qtd) {
        if(qtd < 20){ 
            qtd++;
            precoTotal+=preco;
        }
      this._modalView.updateModal(new Modal(nome,preco,qtd,precoTotal));
      }

    subtrairQuantidade(nome,preco,precoTotal,qtd) {
         if(qtd > 1){ 
            qtd--;
            precoTotal-=preco;
        }
      this._modalView.updateModal(new Modal(nome,preco,qtd,precoTotal));
    }
}