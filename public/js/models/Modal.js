class Modal{

constructor(nome,valor,quantidade,valorTotal){
    this._nome = nome;
    this._valor = valor;
    this._quantidade = quantidade;
    this._valorTotal = valorTotal;
 }
 get nome(){
     return this._nome;
 }

 get quantidade() {
    return this._quantidade;
}

 get valor() {
    return this._valor;
}
 get valorTotal(){
    return this._valorTotal;
}
}