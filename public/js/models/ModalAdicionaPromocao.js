class ModalAdicionaPromocao{

    constructor(id,nome,valor){
        this._id = id;
        this._nome = nome;
        this._valor = valor;
        this._valorPromocao;
     }
     get id(){
         return this._id;
     }
    
     get nome() {
        return this._nome;
    }
    get valor() {
        return this._valor;
    }
    get valorPromocao() {
        return this._valorPromocao;
    }
    }