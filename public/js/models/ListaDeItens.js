class ListaDeItens{
    constructor(){
        this._itens=[];
    }
    adiciona(item){
        this._itens.push(item);
    }
    get itens(){
        return [].concat(this._itens);//retorna uma copia da lista//
    }
}