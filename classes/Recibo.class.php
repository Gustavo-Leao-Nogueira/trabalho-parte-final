<?php

require_once '../model/Banco.inc.php';

class Recibo{
    private $id;
    private $data_entrega;
    private $valor_placa;
    private $valor_sinal;
    private $id_cliente;
    private $id_placa;
    private $banco;

    function __construct($id=null, $data_entrega=null, $valor_placa=0, $valor_sinal=0, $id_cliente=0, $id_placa=0){ 
        $this->id = $id; 
        $this->data_entrega = $data_entrega;
        $this->valor_placa = $valor_placa;
        $this->valor_sinal = $valor_sinal;
        $this->id_cliente = $id_cliente;
        $this->id_placa = $id_placa;
        $this->banco = new Banco('banco', 'root', '');
    }
    function __set($chave, $valor){ $this->$chave = $valor; }
    function __get($chave){ return $this->$chave; }

    
    function getRecibo($id=null){
        if($id == null){
            return array(
                ":id" => $this->id, 
                ":data_entrega" => $this->data_entrega,
                ":valor_placa" => $this->valor_placa,
                ":valor_sinal" => $this->valor_sinal,
                ":id_cliente" => $this->id_cliente,
                ":id_placa" => $this->id_placa
            );
        }
        else{
            $sql = "SELECT * FROM recibo r WHERE r.id = :id";
            $array_de_dados = array(":id" => $id);
            $resposta = $this->banco->executar($sql, $array_de_dados);
            return $resposta;
        }
    }
    function getRecibos(){
        $sql = "SELECT * FROM recibo";
        $resposta = $this->banco->executar_query($sql);
        return $resposta;
    }


    function setRecibo(){
        $sql = "INSERT INTO recibo(id, data_entrega, valor_placa, valor_sinal, id_cliente, id_placa) VALUES(:id, :data_entrega, :valor_placa, :valor_sinal, :id_cliente, :id_placa);";
        $resposta = $this->banco->executar($sql, $this->getRecibo());
        return $resposta;
    }

    function updateRecibo(){
        $sql = "UPDATE recibo r SET r.data_entrega = :data_entrega, r.valor_placa = :valor_placa, r.valor_sinal = :valor_sinal, r.id_cliente = :id_cliente, r.id_placa = :id_placa WHERE r.id = :id;";
        $resposta = $this->banco->executar($sql, $this->getRecibo());
        return $resposta;
    }

    function deleteRecibo($id=0){
        $sql = "DELETE FROM recibo WHERE id = :id;";
        $resposta = $this->banco->executar($sql, array(":id" => $id));
        return $resposta;
    }
}

?>