<?php

require_once '../model/Banco.inc.php';

class Placa{
    private $id;
    private $altura;
    private $largura;
    private $cor_fundo;
    private $cor_texto;
    private $id_cliente;
    private $frase = '';
    
    function __construct($id=null, $altura=0, $largura=0, $cor_fundo='', $cor_texto='', $id_cliente=0, $frase=''){ 
        $this->id = $id; 
        $this->altura = floatval($altura); 
        $this->largura = floatval($largura);
        $this->cor_fundo = $cor_fundo; 
        $this->cor_texto = $cor_texto;
        $this->id_cliente = intval($id_cliente);
        $this->frase = $frase;


        $this->banco = new Banco('banco', 'root', '');
    }
    function __set($chave, $valor){ $this->$chave = $valor; }
    function __get($chave){ return $this->$chave; }

    
    function getPlaca($id=null){
        if($id == null){
            return array(
                ":id" => $this->id,
                ":altura" => $this->altura,
                ":largura" => $this->largura,
                ":cor_fundo" => $this->cor_fundo,
                ":cor_texto" => $this->cor_texto,
                ":id_cliente" => $this->id_cliente,
                ":frase" => $this->frase
            );
        }
        else{
            $sql = "SELECT * FROM placa p WHERE p.id = :id";
            $array_de_dados = array(":id" => $id);
            $resposta = $this->banco->executar($sql, $array_de_dados);
            return $resposta;
        }
    }
    function getPlacas(){
        $sql = "SELECT * FROM placa";
        $resposta = $this->banco->executar_query($sql);
        return $resposta;
    }


    function setPlaca(){
        $sql = "INSERT INTO placa(id, altura, largura, cor_fundo, cor_texto, id_cliente, frase) VALUES(:id, :altura, :largura, :cor_fundo, :cor_texto, :id_cliente, :frase);";
        $resposta = $this->banco->executar($sql, $this->getPlaca());
        return $resposta;
    }

    function updatePlaca(){
        $sql = "UPDATE placa p SET p.altura = :altura, p.largura = :largura, p.cor_fundo = :cor_fundo, p.cor_texto = :cor_texto, p.id_cliente = :id_cliente, p.frase = :frase WHERE p.id = :id;";
        $resposta = $this->banco->executar($sql, $this->getPlaca());
        return $resposta;
    }

    function deletePlaca($id=0){
        $sql = "DELETE FROM placa WHERE id = :id;";
        $resposta = $this->banco->executar($sql, array(":id" => $id));
        return $resposta;
    }
}

?>