<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<?php echo $output; ?>
<?= $this->endSection() ?>


<?= $this->section('javascript') ?>
<script>
  $(function () {
    $('#ViewCreator').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      language: {
        url: '<?=base_url("/admin_lte/plugins/datatables/pt_br.json")?>'
      }
    });
  });
</script>
<?= $this->endSection() ?>

