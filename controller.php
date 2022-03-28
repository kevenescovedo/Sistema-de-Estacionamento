<?php 
include("carro.php");
class Controller {
    public static function Inserir($placa,$modelo,$cor,$proprietario,$telefone) {
 $carro = new Carro($placa, $modelo, $cor, $proprietario, $telefone);
$response = $carro->inserirCarro();

header("Location:index.php?response=$response");
      

      } 
      public static function getCarros() {
        Carro::setDb();
       return Carro::pegarCarros();
      
             
       
             } 
             public static function getCarro($id) {
                Carro::setDb();
               return Carro::pegarCarro($id);
              
                     
               
                     }        
      public static function alterar($id,$placa,$modelo,$cor,$proprietario,$telefone) {
        $carro = new Carro($placa, $modelo, $cor, $proprietario, $telefone);
        $carro->setId($id);
       $response = $carro->alterarCarro();
       header("Location: index.php?response=$response");
             
             }
             public static function excluir($id) {
              
                Carro::setDb();
                Carro::excluirCarro($id);
               header("Location: listar.php");
                     
                     } 


}
?>