<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        header("Location: ../dashboard-login.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Painel de Controle</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/TCC/dashboard/menu.php">Home<span class="sr-only">(página atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Preços</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Clientes
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/TCC/dashboard/view/viewAlterarCliente.php">Alterar</a>
            <a class="dropdown-item" href="/TCC/dashboard/view/viewConsultarCliente.php">Consultar</a>
            <a class="dropdown-item" href="/TCC/dashboard/view/viewNovoCliente.php">Novo</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pedidos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/TCC/dashboard/view/viewConsultarServico.php">Status</a>
            <a class="dropdown-item" href="/TCC/dashboard/view/viewAlterarServico.php">Editar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Outros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="/TCC/dashboard/logoutdashboard.php">Sair</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="/TCC/dashboard/view/viewConsultarCliente.php" method="GET">
        <input class="form-control mr-sm-2" type="search" name="nome" placeholder="Digite o nome do cliente" aria-label="Pesquisar">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
    </div>
  </nav>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
