<?php 
require_once("db.php");
class Carro {
    private static $db;
    private $id;
    private $placa;
    private $modelo;
    private $cor;
   private $proprietario;
    private  $telefone;

    public function __construct(String $placa, String $modelo, String $cor, String $proprietario, String $telefone ) {
     self::$db = new Banco();
     $this->placa = $placa;
     $this->modelo = $modelo;
     $this->cor =$cor;
     $this->proprietario = $proprietario;
     $this->telefone = $telefone;
    }
    public static function setDb() {
        self::$db = new Banco();
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getPlaca() {
        return $this->placa;
    }
    public function setPlaca($placa) {
        $this->placa = $placa;
    }
    public function getModelo() {
        return $this->modelo;
    }
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getCor() {
        return $this->cor;
    }
    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function getProprietario() {
        return $this->proprietario;
    }
    public function setProprietario($proprietario) {
        $this->proprietario = $proprietario;
    }

    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function toArray () {
      $data = [
            'placa' => $this->placa,
            'modelo' => $this->modelo,
            'cor' => $this->cor,
            'proprietario' => $this->proprietario,
            'telefone' => $this->telefone
        ];
        if($this->id != null) {
            $data["id"] = $this->id;
        }
        return $data;
    }
    public function inserirCarro() {
  
        try {
        self::$db->inserir($this->toArray());
       return "Dados Inseridos com sucesso";
        }catch(Exception $e) {
            echo $e->getMessage();
        return "Falha ao Inserir";
           
        }
        
        
    }
    public function alterarCarro() {
    
        try {
        self::$db->alterar($this->toArray());
        return "Dados Alterados com sucesso";
        }catch(Exception $e) {
            echo $e->getMessage();
          
           
        }
        
    }
    public static function excluirCarro($id) {
    
        try {
        self::$db->excluir($id);
       
        }catch(Exception $e) {
            echo $e->getMessage();
          
           
        }
        
    }
    public static function pegarCarros() {
        $listaCarros = self::$db->selecionarTodos();
        return $listaCarros;
    }
    public static function pegarCarro($id) {
        $carro = self::$db->selecionarUm($id);

        return $carro;
    }
}
?>