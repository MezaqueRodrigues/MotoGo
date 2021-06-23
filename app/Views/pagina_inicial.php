<!DOCTYPE HTML>
<html lang="pt-br">
<head>
  <title>Página Inicial - MotoGo</title>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Estilo Customizado -->
  <link rel="stylesheet" href="css/estilo.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon.png"> 

</head>

<body>
  <header><!-- Início Cabeçalho -->
    <nav class="navbar navbar-expand-lg navbar-light pt-4 pb-4">
        <div class="container">

            <a href="index.html" class="navbar-brand d-flex align-items-end"><!-- Início Logo -->
              <h1 class=" d-flex align-items-end mr-2" style="color: #036970;">
                <span class="mr-2">MotoGo</span>
                <img style="width: 60px;"  src="img/logo.png" alt="">
              </h1>
            </a><!-- Fim Logo -->

            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal"><!-- Início Botão Menu -->
            <span class="navbar-toggler-icon"></span>
            </button><!-- Fim Botão Menu -->

            <div class="collapse navbar-collapse" id="nav-principal"><!-- Início Itens Menu -->
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item mr-3">
                      <a class="nav-link active" href="index.html">Página Inicial</a>
                  </li>
                  <li class="nav-item mr-3">
                      <a class="nav-link" href="empresas.html">Empresas</a>
                  </li>
                  <li class="nav-item mr-3">
                      <a class="nav-link" href="motoboy.html">Motoboy</a>
                  </li>
                  <li class="nav-item mr-5">
                      <a class="nav-link" href="quem_somos.html">Quem Somos</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-outline-info" href="login.html">Login</a>
                </li>
              </ul>
            </div><!-- Início Itens Menu -->

        </div>
    </nav>
  </header><!-- Fim Cabeçalho -->

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"><!-- Início Carousel -->
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <img class="d-block w-100" src="img/imagem1.png" alt="Primeiro Slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="img/imagem2.png" alt="Segundo Slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="img/imagem3.png" alt="Terceiro Slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
  </div><!-- Fim Carousel -->

  <div class="container-fluid row mt-5 ml-auto mr-auto">
    <div class="col-lg-4 p-5 mr-auto mt-2" style="background-color: #EBFDFE;"><!-- Início Bloco Motoboy -->
      <div class="text-center">
        <h3> Você é um Motoboy? </h3> 
        <p class="mt-4">Cadastre-se abaixo e seja parte da MotoGo!</p> 
        <a class="btn btn-info  mt-3" href="cadastro_motoboy.html">Cadastre-se Aqui</a> 
      </div>
    </div><!-- Fim Bloco Motoboy -->
    <div class="col-lg-3 p-5 mt-2" style="background-color: #EBFDFE;"><!-- Início Bloco Solicitar Pedido -->
      <div class="text-center">
        <h3>Deseja solicitar uma entrega? </h3> 
        <p class="mt-3">Faça o pedido abaixo:</p>
        <a class="btn btn-info  mt-3" href="entregas.html">Solicitar Entrega</a>
      </div>     
    </div><!-- Fim Bloco Solicitar Pedido -->
    <div class="col-lg-4 p-5 ml-auto mt-2" style="background-color: #EBFDFE;"><!-- Início Bloco Empresa --> 
      <div class="text-center">
        <h3>Você é uma empresa? </h3>
          <p class="mt-4">Cadastre-se abaixo!</p>
          <a class="btn btn-info mt-3" href="cadastro_empresa.html">Cadastrar Empresa</a> 
      </div>
    </div><!-- Fim Bloco Empresa -->
  </div>   
  
  <br><hr>

  <div><!-- Início Bloco para o Quem Somos -->
        <div class="col-lg-7 p-4 ml-auto mt-2" class="text-center">
          <h3> Quem somos? </h3> 
          <p class="mt-2">Clique abaixo e conheça um pouco sobre os criadores da MotoGo!</p> 
          <a class="btn btn-info  mt-2" href="quem_somos.html">Clique aqui</a> 
        </div>
  </div><!-- Fim Bloco para o Quem Somos -->

  <footer class=" mt-4 pt-5 pb-5 bg-333333"><!-- Início Rodapé -->
    <div class="container">
        <div class="text-center text-light">
        Copyright © 2021 | <span style="color: #ffcc43;">MotoGo</span>
        </div> 
    </div>
</footer><!-- Fim Rodapé -->

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