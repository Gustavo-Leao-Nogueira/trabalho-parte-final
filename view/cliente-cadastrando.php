<?php 
    require_once '../includes/Config.inc.php'; 
    setTitulo('Cliente - Cadastro de cliente');
    require_once '../includes/Header.inc.php';  
    require_once '../includes/Nav.inc.php'; 
?>
    
   

    <form action="../controller/cliente-cadastrar.php" method="POST">       
            <div class="w3-panel">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="w3-input" placeholder="Digite seu nome" required>
            </div>
            
                <div class="w3-panel">
                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone" id="telefone" placeholder="(DDD) XXXXX-XXXX"  class="w3-input" required>
                </div>

                <input type="submit" class="w3-green w3-round w3-btn w3-block" value="Cadastrar">
                </div>
        
    </form>

    <?php require_once '../includes/Footer.inc.php'; ?>