class ItemView{
    constructor(elemento) {
        this._elemento = elemento;
    }
    _template(model) {
        return `
                ${model.itens.map(n => `
                    <tr class="col-12 tr-item" style="width:100%">
                        <td class="nome">${n.nome.substr(0, 20)}</td>
                        <td hidden class="nome">${n.nome}</td>
                        <td class="td_QTD">${n.quantidade}</td>
                        <td class="td_valores">${n.valor}</td>
                    </tr>
                `).join('')} 
    `;
}
update(model) {
    this._elemento.innerHTML = this._template(model);
}

}
