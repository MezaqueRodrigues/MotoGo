<?= $this->extend('template/site/template') ?>

<?= $this->section('content') ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"><!-- Início Carousel -->
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?= base_url("img/imagem1.png") ?>" alt="Primeiro Slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url("img/imagem2.png") ?>"" alt="Segundo Slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url("img/imagem3.png") ?>"" alt="Terceiro Slide">
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

  <?= $this->endSection() ?>