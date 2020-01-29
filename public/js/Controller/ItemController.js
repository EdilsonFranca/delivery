class ItemController{
    constructor(){
            let $ = document.querySelector.bind(document);
            this._listaDeItens = new ListaDeItens();
            this._itemView = new ItemView($('#sacola-table-id'));
            this._itemView.update(this._listaDeItens);
            this._excluiSession();
    } 
    adiciona(){
           let nome = document.querySelector('#nome-modal').textContent;
           let quantidade = document.querySelector('#quantidade-modal').textContent;
           let valor = document.querySelector('#valor-total-modal').textContent;
           this._listaDeItens.adiciona(new Item(nome,quantidade,valor));
           this._itemView.update(this._listaDeItens);
           $('#ExemploModalCentralizado').modal('hide');
           this._criaSession(nome,quantidade,valor);
           document.querySelector('#quantidade-modal').innerHTML=1;
           this.alteraValorTotal();
           this.atualizaSacola();
           document.querySelector('#mensagemView').style.display = "none";
      }
        
     atualizaSacola(){
        let td_quantidades = document.querySelectorAll('.td_QTD');
        let cont_qtd=0;
        td_quantidades.forEach(produto => cont_qtd+= parseInt(produto.textContent)); 
        document.querySelector('.nav-link-menu-sacola > span').innerHTML = cont_qtd;
      }

     alteraValorTotal(){
          let  cont_valor=0;
          let valores = document.querySelectorAll(".td_valores");
          valores.forEach(valor => {
            cont_valor+= parseFloat(parseFloat(MoneyHelper.moneyTextToFloat(valor.textContent)));
          });
          this.writeTotal(cont_valor);
      }

      writeTotal(value) {
          let taxadeEntrega = MoneyHelper.moneyTextToFloat(document.querySelector(".td-taxa-de-entrega-valor").textContent); 
          let subValorTotal = document.querySelector(".td-sub-valor-total-valor");
          subValorTotal.innerHTML=MoneyHelper.floatToMoneyText(value);
          document.querySelector(".td-valor-total-valor").innerHTML = MoneyHelper.floatToMoneyText(value+taxadeEntrega);
      }

      _criaSession(nome,quantidade,valor){
         $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'post',
            url:  'session/set',
            data: { nome : nome,quantidade :quantidade,valor :valor}
        });	 
      }

     _excluiSession(){
       document.querySelector('.limpa-sacola').onclick = function() {
       $.ajax({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         type: 'get',
         url:  'session/remove'
      });
      location.reload();
     }
   }

 }