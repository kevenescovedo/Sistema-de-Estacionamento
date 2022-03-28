function exclusao(id) {
      
    var msg = confirm("Atenção: Deseja Excluir esse Registro?");

    if (msg){
       
        window.location.href = "action.php?id=" + id;

    }
    else{
        alert("Operação Cancelada, o Registro não será Excluído!");


    }


}
let textos = [
    "Insira aqui a placa do veículo",
    "Insira aqui o modelo do carro",
    "Insira aqui a cor do carro",
    "Insira aqui o nome do dono do carro",
    "Insira aqui o telefone do dono do carro",
]

document.querySelectorAll("input[type='text']").forEach((element,index) => {
    element.addEventListener("keypress", (event) => {
      
          
           
                    
           
              
                console.log(index);
                console.log(textos[index]);

                document.querySelector("#" + element.name.concat("Help")).innerText = textos[index];
                document.querySelector("#"+ element.name.concat("Help")).style = "";
               
            
                
        
    
         
          
        if(element.value == ""){
            console.log("#" + element.name);

            document.querySelector("#" + element.name.concat("Help")).innerText = "";
            document.querySelector("#" + element.name.concat("Help")).innerText = "O campo " + element.name + " Deve ser preenchido!!!";
            document.querySelector("#"+ element.name.concat("Help")).style = "color: red !important";
        
        }
    })
});
    


document.querySelector("#form").addEventListener("submit", (event) => {
    var envia = false;
   
    let counter = 0;
    var countError = 0;
    for(let element of document.querySelector("#form").children[0]) {
     
      
          
            if(counter <= 4) {
                console.log("#" + element.name);
           
            document.querySelector("#" + element.name.concat("Help")).innerText = "";
            console.log(counter);
            console.log(textos[counter]);
            document.querySelector("#" + element.name.concat("Help")).innerText = textos[counter];
            document.querySelector("#"+ element.name.concat("Help")).style = "";
            counter = counter + 1;
            }
    }
    counter = 0;
  for(let element of document.querySelector("#form").children[0]) {
     
      
    if(element.value == "" && counter <= 4){
        event.preventDefault();
        console.log("#" + element.name);
        countError = countError + 1;
        document.querySelector("#" + element.name.concat("Help")).innerText = "";
        document.querySelector("#" + element.name.concat("Help")).innerText = "O campo " + element.name + " Deve ser preenchido!!!";
        document.querySelector("#"+ element.name.concat("Help")).style = "color: red !important";
        counter = counter + 1;
    }

   
  }
  if(countError == 0) {
    console.log("sem erro");
    console.dir(event);
    envia = true;
  
  }
     
console.log(envia);
return envia;
});
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}
