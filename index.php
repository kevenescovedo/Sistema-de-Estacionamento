<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Estacionamento</title>
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <a href= "listar.php">Ver carros</a>
    

    <h1>Estacionamento</h1>
<?php 
$action = "action.php";
$placa = "";
$modelo = "";
$cor = "";
$proprietario = "";
$telefone = "";

?>
    <?php if(isset($_GET['id'])) {
   require_once("controller.php");
   require_once("carro.php");

$carro  = Controller::getCarro($_GET['id']);
$action = "action.php?id=". $_GET['id'];
$placa = $carro->getPlaca();
$modelo = $carro->getModelo();
$cor = $carro->getCor();
$proprietario = $carro->getProprietario();
$telefone = $carro->getTelefone();
  }
  ?>
 <div id="form">   

<form action= "<?php echo $action;?>" role="form" method="POST" id="form">
<div class="row">
<div class="col-md-4 col-xs-12">
  <div class="form-group">
  <label for="placa">Placa:</label><br>
<input type="text" id="placa" name="placa" maxlength="7" value= "<?php echo $placa;  ?>" max="7"> <br>
  <small id="placaHelp" class="form-text text-muted">Insira aqui a placa do veículo </small>
</div>
  <div class="form-group">
  <label for="modelo">Modelo:</label><br>
  <input type="text" id="modelo" name="modelo" value= "<?php echo $modelo; ?>"><br>
  <small id="modeloHelp" class="form-text text-muted">Insira aqui o modelo do carro </small>
</div>
 <div  class="form-group">
  <label for="cor">Cor:</label><br>
  <input type="text" id="cor" name="cor" value= "<?php echo $cor; ?>"><br><br>
  <small id="corHelp" class="form-text text-muted">Insira aqui a cor do carro </small>
</div>
</div>

<div class="col-md-4 col-xs-12">
  <br/>
  <div class="form-group">
  <label for="proprietario">Proprietário:</label><br>
  <input type="text" id="proprietario" name="proprietario" value= "<?php echo $proprietario; ?>"> <br>
  <small id="proprietarioHelp" class="form-text text-muted">Insira aqui o nome do dono do carro </small>
</div>
<div class="form-group">
  <label for="telefone">Telefone:</label><br>
  <input type="text" id="telefone"  maxlength="15" name="telefone" value= "<?php echo $telefone;?>"><br>
  <small id="telefoneHelp" class="form-text text-muted">Insira aqui o telefone do dono do carro </small>
</div>  
</div>
  
  
  
</div>
<input type="submit" class='btn btn-success'value="Salvar">
</form>
<br/>

  <?php if(isset($_GET['response'])) {
  if($_GET['response'] == "Dados Inseridos com sucesso" || $_GET['response'] == "Dados Alterados com sucesso") {
    echo "<div class='alert alert-success' role='alert'>".$_GET['response']."</div>";
  }
  else {
   echo "<div class='alert alert-danger' role='alert'>".$_GET['response']."</div>";
  }
  }
      ?>
      </br>
      <?php if(isset($_GET['id'])) {
   echo"<script src='alterar.js'></script>";
  }
  ?>     

</div>
<script src= "index.js"></script>
</body>
</html>
