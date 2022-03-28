<?php 
class Banco {
    static $db = "";
    
    public function __construct() {
        try{
            self::$db = new PDO("mysql:host=localhost;dbname=estacionamento", "root", "" );
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
            

    }
    public function inserir($data) {
        echo $data['placa'];
        $sql_insert = "INSERT INTO carro (placa,modelo,cor,proprietario,telefone) VALUES (:placa,:modelo,:cor,:proprietario,:telefone) ";
        $stmt = self::$db->prepare($sql_insert);
 $stmt->bindParam(':placa', $data['placa']);
  $stmt->bindParam(':modelo', $data['modelo']);
  $stmt->bindParam(':cor', $data['cor']);
  $stmt->bindParam(':proprietario', $data['proprietario']);
  $stmt->bindParam(':telefone', $data['telefone']);
  $stmt->execute();
    }
    public function alterar($data) {
        echo $data['id'];
        $sql_insert = "UPDATE carro SET placa = :placa , modelo = :modelo , cor = :cor, proprietario = :proprietario, telefone = :telefone WHERE id = :id"; 

        $stmt = self::$db->prepare($sql_insert);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':placa', $data['placa']);
  $stmt->bindParam(':modelo', $data['modelo']);
  $stmt->bindParam(':cor', $data['cor']);
  $stmt->bindParam(':proprietario', $data['proprietario']);
  $stmt->bindParam(':telefone', $data['telefone']);
  $stmt->execute();
    }
    public function excluir($id) {
        
        $sql_insert = "DELETE FROM carro WHERE id = :id "; 
       $stmt = self::$db->prepare($sql_insert);
       $stmt->bindParam(":id", $id);
       $stmt->execute();
    }
    public  function  selecionarTodos() {
        $sql_insert = "Select * FROM carro";
        $list = self::$db->query($sql_insert)->fetchAll();
        return $list;
    }
    public function selecionarUm($id) {
        $carro = "";
        $sql = "SELECT * FROM carro WHERE id = ?";
        $stmt = self::$db->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->execute();
        foreach($stmt as $row) {
            $carro = new Carro($row['placa'], $row['modelo'], $row['cor'],$row['proprietario'],$row['telefone']);
            break;
        }
        return $carro;
    }
}
?>