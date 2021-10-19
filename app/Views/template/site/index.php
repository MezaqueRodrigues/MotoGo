<?= $this->extend('template/site/template') ?>

<?= $this->section('content') ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <!-- Início Carousel -->
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
      <img class="d-block w-100" src="<?= base_url("img/imagem2.png") ?>"" alt=" Segundo Slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url("img/imagem3.png") ?>"" alt=" Terceiro Slide">
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

<div class="container row mt-5 ml-auto mr-auto">
  <div class="display-4">
    MotoGo
  </div>
  <div class="mt-4">
    <p>A finalidade deste projeto é facilitar a comunicação entre motoboys e empresas. Deste modo, quando uma empresa necessitar fazer uma entrega de determinado produto, ela poderá solicitar no aplicativo, e os motoboys que estiverem disponíveis poderão fazer a entrega.
    </p>
    <p>O MotoGo atuará em estabelecimentos comerciais, como lojas e
      farmácias, a fim de melhorar o acesso de motoboys às empresas,
      oferecendo, assim, maior número de vagas empregatícias para
      trabalhadores autônomos.
    </p>
  </div>
</div>
<?= $this->endSection() ?>