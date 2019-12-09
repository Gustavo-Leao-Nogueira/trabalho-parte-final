<?php
    if($_POST){
        if(isset($_POST['id']) and isset($_POST['nome']) and isset($_POST['telefone'])){
            require_once '../classes/Cliente.class.php';
            $cliente = new Cliente($_POST['id'], $_POST['nome'], $_POST['telefone']);
            $cliente->updateCliente();
        }
    }
    header('Location: ../view/index.php');
?>