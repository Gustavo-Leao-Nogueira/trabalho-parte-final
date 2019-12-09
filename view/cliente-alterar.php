<?php 
    require_once '../includes/Config.inc.php'; 
    setTitulo('Cliente - Alterar Cliente');
    require_once '../includes/Header.inc.php';  
    require_once '../includes/Nav.inc.php'; 
?>

    
    <?php
        require_once '../controller/cliente-listar.php';
        $lista = listarUm($_GET['id']);

        echo '<form action="../controller/cliente-alterar.php" method="POST" class="w3-display-container">';
        while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
            echo '<div class="w3-panel">';
                echo '<label for="nome">Nome:</label>';    
                echo '<input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="'.$linha['nome'].'" class="w3-input" />';
            echo '</div>';

            echo '<div class="w3-panel">';
                echo '<label for="telefone">Telefone:</label>';    
                echo '<input type="tel" name="telefone" id="telefone" placeholder="Digite seu telefone " value="'.$linha['telefone'].'" class="w3-input" />';
            echo '</div>';

                echo '<input type="hidden" name="id" id="id" value="'.$linha['id'].'" class="w3-input"/>';
        }
            echo '<input type="submit" class="w3-green w3-round w3-btn w3-block" value="Atualizar    ">';
        echo '</form>';

    ?>

<?php require_once '../includes/Footer.inc.php'; ?>