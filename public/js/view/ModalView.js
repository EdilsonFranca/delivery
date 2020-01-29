class ModalView{
    constructor(elemento) {
        this._elemento = elemento;
    }
    
    _templateModel(modal) {
        return ` 
        <div id="modal-header" class="text-center  text-secondary h5">
            <span id="nome-modal" class="nome-modal">${modal.nome}</span>
            <span class="valor-modal" hidden>${modal.valor}</span>
            <span id="valor-total-modal" class="valor-total-modal text-danger">${MoneyHelper.floatToMoneyText(modal.valorTotal)}</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-footer container-fluid">
            <div class="row">
                <span class="col-3 quantidade-titulo">Quantidade</span>
                <span class="subtrai col-1 btn btn-outline-info"onclick="modalController.subtrairQuantidade('${modal.nome}',${modal.valor},${modal.valorTotal},${modal.quantidade})" >-</span>
                <span id="quantidade-modal" class="form-control quantidade-modal col-3">${modal.quantidade}</span>
                <span class="adiciona  col-1 btn btn-outline-primary" onclick="modalController.adicionarQuantidade('${modal.nome}',${modal.valor},${modal.valorTotal},${modal.quantidade})">+</span>
                <button class="btn btn-outline-primary adiciona-na-sacola col-3" onclick="itemController.adiciona()">Adicionar</button>
            </div>
        </div>`;
         }

updateModal(modal) {
    this._elemento.innerHTML = this._templateModel(modal);
}
}