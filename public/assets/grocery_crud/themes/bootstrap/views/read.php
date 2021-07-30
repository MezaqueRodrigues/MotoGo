<?php

	$this->set_css($this->default_theme_path.'/flexigrid/css/flexigrid.css');
	$this->set_js_lib($this->default_theme_path.'/flexigrid/js/jquery.form.js');
	$this->set_js_config($this->default_theme_path.'/flexigrid/js/flexigrid-edit.js');

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>


<section data-unique-hash="<?php echo $unique_hash; ?>">
        <!-- Horizontal Form -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo $subject ?></h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->            
            <?php echo form_open($read_url, 'method="post" id="crudForm"  enctype="multipart/form-data" class="form-horizontal"'); ?>
            <div class="card-body">

                <?php foreach ($fields as $field) { ?>
                    <div class="form-group row mb-1">
                        <label class="col-sm-2 col-form-label-sm d-sm-block d-md-none"><?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : ""; ?> :</label>
                        <label class="col-sm-2 col-form-label-sm text-right d-none d-md-block"><?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : ""; ?> :</label>

                        <div class="col-sm-10">
                            <?php echo $input_fields[$field->field_name]->input ?>
                        </div>
                    </div>
                <?php } ?>
                <!-- Start of hidden inputs -->
                <?php
                foreach ($hidden_fields as $hidden_field) {
                    echo $hidden_field->input;
                }
                ?>
                <!-- End of hidden inputs -->
                <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php } ?>

                <div id='report-error' class='report-div error'></div>
                <div id='report-success' class='report-div success'></div>

            </div>
            <!-- /.box-body -->
            <div class="card-footer">                
                <input type='button' value='<?php echo $this->l('form_back_to_list'); ?>'     id="cancel-button"            class="btn btn-large btn-warning back-to-list"  />
                <div class='small-loading' id='FormLoading'><?php echo $this->l('form_insert_loading'); ?></div>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?>
        </div>
</section>

<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
</script>
