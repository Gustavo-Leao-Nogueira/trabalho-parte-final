<?php 
    require_once '../includes/Config.inc.php'; 
    setTitulo('Cliente - Alterar Placa');
    require_once '../includes/Header.inc.php';  
    require_once '../includes/Nav.inc.php'; 
?>

    
    <?php
        require_once '../controller/placa-listar.php';
        $lista1 = listarUm($_GET['id']);
        $lista2 = listarTodosClientes();
                    
        echo '<form action="../controller/placa-alterar.php" method="POST" class="w3-display-container">';
        
        while($linha = $lista1->fetch(PDO::FETCH_ASSOC)){
            echo '<div class="w3-panel">';
                echo '<label for="cliente">Cliente:</label>';
                    echo '<select class="w3-select" name="id_cliente" id="id_cliente" required>';
                    while($linha1 = $lista2->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$linha1['id'].'">'.$linha1['nome'].'</option>';
                    }
                echo '</select>';
            echo '</div>';
            
            echo '<div class="w3-panel">';
                echo '<label for="largura">Largura:</label>';
                echo '<input type="number" name="largura" id="largura" class="w3-input" placeholder="Digite a largura da placa" value="'.$linha['largura'].'" required>';
            echo '</div>';

            echo '<div class="w3-panel">';
                echo '<label for="altura">Altura:</label>';
                echo '<input type="number" name="altura" id="altura" class="w3-input" placeholder="Digite a altura da placa" value="'.$linha['altura'].'" required>';
            echo '</div>';

            echo '<div class="w3-panel">';
                echo '<label for="frase">Frase:</label>';
                echo '<textarea name="frase" id="frase" placeholder="Digite sua frase"  class="w3-input" required>'.$linha['frase'].'</textarea>';
            echo '</div>';

            echo '<div class="w3-panel">';
                echo '<label for="cor_fundo">Cor de Fundo:</label>';
                echo '<select name="cor_fundo" id="cor_fundo" class="w3-select" required>';
                    echo '<option value="branca">branca</option>';
                    echo '<option value="cinza">cinza</option>';
                echo '</select>';
            echo '</div>';

            echo '<div class="w3-panel">';
                echo '<label for="cor_texto">Cor de Texto:</label>';
                echo '<select name="cor_texto" id="cor_texto" class="w3-select" required>';
                    echo '<option value="azul">azul</option>';
                    echo '<option value="amarelo">amarelo</option>';
                    echo '<option value="vermelho">vermelho</option>';
                    echo '<option value="verde">verde</option>';
                    echo '<option value="preto">preto</option>';
                echo '</select>';
            echo '</div>';

            echo '<input type="hidden" name="id" id="id" value="'.$linha['id'].'" class="w3-input"/>';
        }
            echo '<input type="submit" class="w3-green w3-round w3-btn w3-block" value="Atualizar    ">';
        echo '</form>';

    ?>



<?php require_once '../includes/Footer.inc.php'; ?>