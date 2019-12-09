<?php 
    require_once '../includes/Config.inc.php'; 
    setTitulo('Cliente - Cadastro de placa');
    require_once '../includes/Header.inc.php';  
    require_once '../includes/Nav.inc.php'; 
?>
    
   

    <form action="../controller/placa-cadastrar.php" method="POST">       

            <div class="w3-panel">
                <label for="cliente">Cliente:</label>
            <?php
                require_once '../controller/cliente-listar.php';
                $lista = listarTodos();
                echo '<select class="w3-select" name="id_cliente" id="id_cliente" required>';
                    echo '<option value="">'.'Selecione'.'</option>';
                while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'.$linha['id'].'">'.$linha['nome'].'</option>';
                }
                echo '</select>';
            ?>
            </div>
            
            <div class="w3-panel">
                <label for="largura">Largura:</label>
                <input type="number" name="largura" id="largura" class="w3-input" placeholder="Digite a largura da placa" required>
            </div>

            <div class="w3-panel">
                <label for="altura">Altura:</label>
                <input type="number" name="altura" id="altura" class="w3-input" placeholder="Digite a altura da placa" required>
            </div>
            
            <div class="w3-panel">
                <label for="frase">Frase:</label>
                <textarea name="frase" id="frase" placeholder="Digite sua frase"  class="w3-input" required></textarea>
            </div>
            
            <div class="w3-panel">
                <label for="cor_fundo">Cor de Fundo:</label>
                <select name="cor_fundo" id="cor_fundo" class="w3-select" required>
                    <option value="">Select</option>
                    <option value="branca">branca</option>
                    <option value="cinza">cinza</option>
                </select>
            </div>

            <div class="w3-panel">
                <label for="cor_texto">Cor de Texto:</label>
                <select name="cor_texto" id="cor_texto" class="w3-select" required>
                    <option value="">Select</option>
                    <option value="azul">azul</option>
                    <option value="amarelo">amarelo</option>
                    <option value="vermelho">vermelho</option>
                    <option value="verde">verde</option>
                    <option value="preto">preto</option>
                </select>
            </div>
            
                <input type="submit" class="w3-green w3-round w3-btn w3-block" value="Cadastrar">
                </div>
        
    </form>

    <?php require_once '../includes/Footer.inc.php'; ?>