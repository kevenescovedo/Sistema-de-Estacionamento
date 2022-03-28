<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Carros no Estacionamento</title>

    <style>
        
        @media only screen and (max-width: 972px) {
  table {
      
     font-size: 12px;
  }
  


}
@media only screen and (max-width: 767px) {
  table {
      
     font-size: 10px;
  }
  button {
      margin-top: 10px;
      margin-left: 200px;
  }

  
}
@media only screen and (max-width: 476px) {
    button, a {
    text-align: center;
    font-size: 7px;
     height:  30px;
     width: 60px;
    }
}
    </style>
</head>
<body>
</br>
<div class="container col-xs-12">
 <div class="card ">
 <div class="card-header">    
<a href="index.php">Inserir Carros</a>   
<div id="table">
    
      <table border="1" class="table">
     <thead>     
    <tr>

        <th scope="col">Placa</th>
        <th scope="col">Modelo</th>
        <th scope="col">Cor</th>
        <th scope="col">Propriétario</th>
        <th scope="col">Telefone</th>
        <th scope="col">Ações</th>
    </tr>
</thead>
<tbody>
    <?php 
    require_once("controller.php");
    foreach(Controller::getCarros() as $row) {
         echo "<tr scope='row'>".
         "<td>".$row['placa']."</td>
         <td>".$row['modelo']."</td>
         <td>".$row['cor']."</td>
        <td>".$row['proprietario']."</td>
         <td>".$row['telefone']."</td>
         <td> <a href='index.php?id=".$row["id"]."' class='btn btn-warning'>Alterar</a><button style='margin-left: 7px' class='btn btn-danger' onclick='exclusao(".$row['id'].")'>Excluir</button></td>
         </tr>";
    }
    ?>
   
</tdbody>
</table>
</div>
</div>
</div>

<script src= "index.js"></script>
</body>
</html>