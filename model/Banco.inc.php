<?php

require_once '../includes/Mensagem.inc.php';

class Banco{
    private $nome;
    private $usuario;
    private $senha;
    private $conexao;

    function __construct($banco='', $usuario='', $senha=''){
        $this->nome = "mysql:host=localhost;dbname=$banco";
        $this->usuario = $usuario;
        $this->senha = $senha;

        $this->conectar();
    }

    function __set($chave, $valor){
        $this->$chave = $valor;
    }

    function __get($chave){
        return $this->$chave;
    }
    
    function conectar(){
        try{
            $this->conexao = new PDO($this->nome, $this->usuario, $this->senha);
        }catch(PDOException $error){
            mensagem('Erro: ', $error->getMessage());
        }
    }
    function executar($sql, $array_de_dados){
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute($array_de_dados);
            return $stmt;
        }catch(PDOException $error){
            mensagem('Erro: ', $error->getMessage());
        }
    }
    function executar_query($sql){
        try{
            $stmt = $this->conexao->query($sql);
            return $stmt;
        }catch(PDOException $error){
            mensagem('Erro: ', $error->getMessage());
        }
    }
}

?>