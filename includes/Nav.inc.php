<nav class="w3-bar w3-blue">
  <a href="index.php" class="w3-bar-item w3-button">Início</a>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Cliente</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="cliente-cadastrando.php" class="w3-bar-item w3-button">Cadastrar</a>
      <a href="cliente-listando-todos.php" class="w3-bar-item w3-button">Listar Todos</a>
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Placa</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="placa-cadastrando.php" class="w3-bar-item w3-button">Cadastrar</a>
      <a href="placa-listando-todos.php" class="w3-bar-item w3-button">Listar Todos</a>
    </div>
  </div>
  <a href="recibo.php" class="w3-bar-item w3-button">Recibo</a>
</nav>

<header class="w3-container w3-panel">
    <h1 class="w3-green w3-padding w3-round w3-center"><?php echo $titulo; ?></h1>
</header>

<main>
    <section class="w3-container w3-panel">