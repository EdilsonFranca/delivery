var modal = document.getElementById("myModal");

// Get the button that opens the modal
let produtos = document.querySelectorAll('.produto');
  produtos.forEach(produto => 
    produto.onclick = function() {
      let valor=moneyTextToFloat(this.children[0].children[1].children[2].textContent);

      modal.style.display = "block";
      
      var valor_modal=document.getElementsByClassName("valor-modal")[0];
      document.getElementsByClassName("titulo-modal")[0].innerHTML=this.children[0].children[1].children[0].textContent;
      valor_modal.innerHTML=floatToMoneyText(valor);
      var total=valor;
      var quantidade = parseFloat(document.querySelector('.quantidade').textContent,10);
      document.querySelector('.adiciona').onclick = function() {
        if(quantidade<20){
           quantidade++;
           total+=valor
           document.querySelector('.quantidade').innerHTML=quantidade;
           valor_modal.innerHTML=floatToMoneyText(total);
          }
       }
       document.querySelector('.subtrai').onclick = function() {
        if(quantidade>1){ 
           quantidade--;
           total-=valor;
           document.querySelector('.quantidade').innerHTML=quantidade;
           valor_modal.innerHTML=floatToMoneyText(total);
          }
       }
   },
     document.querySelector('.close').onclick = function() {
      document.querySelector('.quantidade').innerHTML=1;
     modal.style.display = "none";
     }
  );
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    document.querySelector('.quantidade').innerHTML=1;
    modal.style.display = "none";
  }
}