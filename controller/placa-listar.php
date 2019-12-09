<?php
    function listarTodos(){
        require_once '../classes/Placa.class.php';
        $placa = new Placa();
        $resposta = $placa->getPlacas();
        return $resposta;
    }
    function listarTodosClientes(){
        require_once '../classes/Cliente.class.php';
        $cliente = new Cliente();
        $resposta = $cliente->getClientes();
        return $resposta;
    }
    function listarUm($id){
        require_once '../classes/Placa.class.php';
        $placa = new Placa();
        $resposta = $placa->getPlaca($id);
        return $resposta;
    }
    function listarUmCliente($id){
        require_once '../classes/Cliente.class.php';
        $cliente = new Cliente();
        $resposta = $cliente->getCliente($id);
        return $resposta;
    }
?>

