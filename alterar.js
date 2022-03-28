document.querySelector("#form").addEventListener("submit", (event) => {
    var msg = confirm("Atenção: Deseja Alterar esse Registro?");

    if (msg){
       
       

    }
    else{
       event.preventDefault();


    }
});
