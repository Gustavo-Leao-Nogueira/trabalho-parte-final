<?php

require_once '../model/Banco.inc.php';

class Cliente{
    private $id;
    private $nome;
    private $telefone;
    private $banco;

    function __construct($id=null, $nome='', $telefone=''){ 
        $this->id = $id; 
        $this->nome = $nome; 
        $this->telefone = $telefone; 
        $this->banco = new Banco('banco', 'root', '');
    }
    function __set($chave, $valor){ $this->$chave = $valor; }
    function __get($chave){ return $this->$chave; }

    
    function getCliente($id=null){
        if($id == null){
            return array(
                ":id" => $this->id,
                ":nome" => $this->nome,
                ":telefone" => $this->telefone
            );
        }
        else{
            $sql = "SELECT * FROM cliente c WHERE c.id = :id";
            $array_de_dados = array(":id" => $id);
            $resposta = $this->banco->executar($sql, $array_de_dados);
            return $resposta;
        }
    }
    function getClientes(){
        $sql = "SELECT * FROM cliente";
        $resposta = $this->banco->executar_query($sql);
        return $resposta;
    }


    function setCliente(){
        $sql = "INSERT INTO cliente(id, nome, telefone) VALUES(:id, :nome, :telefone);";
        $resposta = $this->banco->executar($sql, $this->getCliente());
        return $resposta;
    }

    function updateCliente(){
        $sql = "UPDATE cliente c SET c.nome = :nome, c.telefone = :telefone WHERE c.id = :id;";
        $resposta = $this->banco->executar($sql, $this->getCliente());
        return $resposta;
    }

    function deleteCliente($id=0){
        $sql = "DELETE FROM cliente WHERE id = :id;";
        $resposta = $this->banco->executar($sql, array(":id" => $id));
        return $resposta;
    }
}

?>