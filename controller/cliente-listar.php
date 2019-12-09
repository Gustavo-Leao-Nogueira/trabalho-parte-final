<?php
    function listarTodos(){
        require_once '../classes/Cliente.class.php';
        $cliente = new Cliente();
        $resposta = $cliente->getClientes();
        return $resposta;
    }
    function listarUm($id){
        require_once '../classes/Cliente.class.php';
        $cliente = new Cliente();
        $resposta = $cliente->getCliente($id);
        return $resposta;
    }
?>

