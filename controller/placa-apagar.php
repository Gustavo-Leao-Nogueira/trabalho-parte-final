<?php
    if($_GET){
        if(isset($_GET['id'])){
            require_once '../classes/Placa.class.php';
            $placa = new Placa();
            $placa->deletePlaca($_GET['id']);
        }
    }
    header('Location: ../view/index.php');
?>

