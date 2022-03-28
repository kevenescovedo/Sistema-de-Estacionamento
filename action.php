<?php 
require_once("controller.php");
if(isset($_POST) && !isset($_GET['id']) ) {
$placa = $_POST["placa"];
$modelo = $_POST["modelo"];
$cor = $_POST["cor"];
$proprietario = $_POST['proprietario'];
$telefone = $_POST['telefone'];
Controller::inserir($placa, $modelo, $cor, $proprietario, $telefone);

}
else if(isset($_POST['placa']) && isset($_GET['id']) ) {
    $placa = $_POST["placa"];
    $modelo = $_POST["modelo"];
    $cor = $_POST["cor"];
    $proprietario = $_POST['proprietario'];
    $telefone = $_POST['telefone'];
    $id = $_GET["id"];
    Controller::alterar($id,$placa, $modelo, $cor, $proprietario, $telefone);
     
    }

else {
 Controller::excluir($_GET['id']);
}    

?>