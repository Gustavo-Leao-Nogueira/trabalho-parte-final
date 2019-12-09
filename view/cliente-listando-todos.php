<?php 
    require_once '../includes/Config.inc.php'; 
    setTitulo('Cliente - Todos os Clientes');
    require_once '../includes/Header.inc.php';  
    require_once '../includes/Nav.inc.php'; 
?>
    
    <?php
        require_once '../controller/cliente-listar.php';
        $lista = listarTodos();
        echo '<table class="w3-table w3-striped">';
            echo '<tr class="w3-green">';
                echo '<th>'.'Nome'.'</th>';
                echo '<th>'.'Telefone'.'</th>';
                echo '<th>'.'Editar'.'</th>';
                echo '<th>'.'Apagar'.'</th>';
            echo '</tr>';
        while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
            echo '<tr>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['telefone'].'</td>';
                echo '<td>'.'<a href="cliente-alterar.php?id='.$linha['id'].'">'.'Editar'.'</a>'.'</td>';
                echo '<td>'.'<a href="../controller/cliente-apagar.php?id='.$linha['id'].'">'.'Apagar'.'</a>'.'</td>';
            echo '</tr>';
        }
        echo '</table>';
    ?>

<?php require_once '../includes/Footer.inc.php'; ?>