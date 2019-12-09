<?php 
    require_once '../includes/Config.inc.php'; 
    setTitulo('Cliente - Todas as Placas');
    require_once '../includes/Header.inc.php';  
    require_once '../includes/Nav.inc.php'; 
?>
    
    <?php
        require_once '../controller/placa-listar.php';
        $lista = listarTodos();
        echo '<table class="w3-table w3-striped">';
            echo '<tr class="w3-green">';
                echo '<th>'.'Cliente'.'</th>';
                echo '<th>'.'Frase'.'</th>';
                echo '<th>'.'Editar'.'</th>';
                echo '<th>'.'Apagar'.'</th>';
            echo '</tr>';
        while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
            $lista2 = listarUmCliente($linha['id_cliente']);
            echo '<tr>';
                while($linha1 = $lista2->fetch(PDO::FETCH_ASSOC)){
                    if($linha['id_cliente'] == $linha1['id']){
                        echo '<td value="'.$linha['id_cliente'].'">'.$linha1['nome'].'</td>';
                    }
                }
                echo '<td>'.$linha['frase'].'</td>';
                echo '<td>'.'<a href="placa-alterar.php?id='.$linha['id'].'">'.'Editar'.'</a>'.'</td>';
                echo '<td>'.'<a href="../controller/placa-apagar.php?id='.$linha['id'].'">'.'Apagar'.'</a>'.'</td>';
            echo '</tr>';
        }
        echo '</table>';
    ?>

<?php require_once '../includes/Footer.inc.php'; ?>