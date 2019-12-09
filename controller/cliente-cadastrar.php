<?php
    if($_POST){
        if(isset($_POST['nome']) and isset($_POST['telefone'])){
            require_once '../classes/Cliente.class.php';
            $cliente = new Cliente(null, $_POST['nome'], $_POST['telefone']);
            var_dump($cliente->setCliente());
        }
    }
    header('Location: ../view/index.php');
?>

