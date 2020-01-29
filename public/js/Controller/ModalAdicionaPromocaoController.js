class ModalAdicionaPromocaoController{
    constructor() {
        let $ = document.querySelector.bind(document);
        this._modal = new ModalAdicionaPromocao();
        this._modalView = new ModalAdicionaPromocaoView($('#adiciona-promocao'));
        this._modalView.updateModal(this._modal);
    }


    criaModal(id,nome,valor){
        this._modal = new ModalAdicionaPromocao(id,nome,valor);
        this._modalView.updateModal(this._modal);
        $('#ExemploModalCentralizadoAdicionaPromocao').modal('show');
    }
}