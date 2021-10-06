<!DOCTYPE HTML>
<html lang="pt-br">
<head>
  <title>Página Inicial - MotoGo</title>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Estilo Customizado -->
  <link rel="stylesheet" href="<?= base_url("css/estilo.css")?>">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon.png"> 

</head>

<body>
  <header><!-- Início Cabeçalho -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">

            <a href="index.html" class="navbar-brand d-flex align-items-end"><!-- Início Logo -->
              <h1 class=" d-flex align-items-end mr-2" style="color: #036970;">
                <span class="mr-2">MotoGo</span>
                <img style="width: 60px;"  src="<?= base_url("img/logo.png")?>" alt="">
              </h1>
            </a><!-- Fim Logo -->

            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal"><!-- Início Botão Menu -->
            <span class="navbar-toggler-icon"></span>
            </button><!-- Fim Botão Menu -->

            <div class="collapse navbar-collapse" id="nav-principal"><!-- Início Itens Menu -->
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item mr-3">
                      <a class="nav-link active" href="<?= base_url('home') ?>">Página Inicial</a>
                  </li>
                  <li class="nav-item mr-3">
                      <a class="nav-link" href="<?= base_url('home/empresas') ?>">Empresas</a>
                  </li>
                  <li class="nav-item mr-3">
                      <a class="nav-link" href="<?= base_url('home/motoboy') ?>">Motoboy</a>
                  </li>
                  <li class="nav-item mr-3">
                      <a class="nav-link" href="<?= base_url('home/quem_somos') ?>">Quem Somos</a>
                  </li>
                  <li class="nav-item mr-3">
                      <a class="nav-link" href="<?= base_url('home/contato') ?>">Contato</a>
                  </li>
                  <li class="nav-item mr-5">
                      <a class="nav-link" href="<?= base_url("login") ?>">Cadastre-se</a>
                  </li>
                  
                <li class="nav-item">
                    <a class="btn btn-outline-info" href="<?= base_url("restrito/main") ?>">Login</a>
                </li>
              </ul>
            </div><!-- Início Itens Menu -->

        </div>
    </nav>
  </header><!-- Fim Cabeçalho -->

  
<?= $this->renderSection('content') ?>  

  

<?php include_once "rodape.php" ?>

  <!-- JavaSript -->
  <script src="jsgeral.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>

  <!-- JavaScript (Opcional) -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>
</html>
<!-- testando alteração-->