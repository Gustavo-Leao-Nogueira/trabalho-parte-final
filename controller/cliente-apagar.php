<?php
    if($_GET){
        if(isset($_GET['id'])){
            require_once '../classes/Cliente.class.php';
            $cliente = new Cliente();
            $cliente->deleteCliente($_GET['id']);
        }
    }
    header('Location: ../view/index.php');
?>

