<?php
    
    if($_POST){
        if(isset($_POST['altura']) and isset($_POST['largura']) and isset($_POST['cor_fundo']) and isset($_POST['cor_texto']) and isset($_POST['id_cliente']) and isset($_POST['frase'])){
            require_once '../classes/Placa.class.php';
            $placa = new Placa(null, $_POST['altura'], $_POST['largura'], $_POST['cor_fundo'], $_POST['cor_texto'], $_POST['id_cliente'], $_POST['frase']);
            $placa->setPlaca();
        }
    }
    header('Location: ../view/index.php');
?>

