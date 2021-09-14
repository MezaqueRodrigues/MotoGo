<?= $this->extend('template/site/template') ?>

<?= $this->section('content') ?>
 <!-- Main content -->
 <div class="container">
   <h1>Contato</h1>
   <hr>
      <div class="row">
        <div class="col-md-12">
       
            
          <form>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" placeholder="Enter ...">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Enter ...">
            </div>

            <div class="form-group mb-3">
                <label>Mensagem</label>
                <textarea class="textarea" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
              
            <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
          
            </form>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
</div>
<?= $this->endSection() ?>



<?= $this->section('javascript') ?>
<link rel="stylesheet" href="<?= base_url() ?>/admin_lte/plugins/summernote/summernote-bs4.css">
<script src="<?= base_url() ?>/admin_lte/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<?= $this->endSection() ?>