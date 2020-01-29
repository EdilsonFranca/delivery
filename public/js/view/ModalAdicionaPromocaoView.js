class ModalAdicionaPromocaoView{
    constructor(elemento) {
        this._elemento = elemento;
    }
    
    _templateModel(modal) {
        return ` 
                <input hidden value="${modal.id}" name="id">
                <div id="modal-header" class="text-center text-primary"><h5>${modal.nome}  ${MoneyHelper.floatToMoneyText(modal.valor)}</h5></div>
                <div class="row" id="modal-footer">
                   <span class="col-5 text-center text-muted">valor com Promoção</span> 
                   <input class="col-4" type="text" name="valor-promocao">
                   <button class="col-2 btn btn-outline-primary">adicionar</button>
                </div>
                `;
         }

updateModal(modal) {
    this._elemento.innerHTML = this._templateModel(modal);
}
}