<?php
    function listarTodos(){
        require_once '../classes/Recibo.class.php';
        $recibo = new Recibo();
        $resposta = $recibo->getRecibos();
        return $resposta;
    }
    function listarTodosClientes(){
        require_once '../classes/Cliente.class.php';
        $cliente = new Cliente();
        $resposta = $cliente->getClientes();
        return $resposta;
    }
    function listarUm($id){
        require_once '../classes/Recibo.class.php';
        $recibo = new Recibo();
        $resposta = $recibo->getRecibo($id);
        return $resposta;
    }
    function listarUmCliente($id){
        require_once '../classes/Cliente.class.php';
        $cliente = new Cliente();
        $resposta = $cliente->getCliente($id);
        return $resposta;
    }
?>

