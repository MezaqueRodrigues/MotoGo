<?php
$this->set_css($this->default_theme_path . '/bootstrap/css/flexigrid.css');
$this->set_js_lib($this->default_javascript_path . '/' . grocery_CRUD::JQUERY);

if ($dialog_forms) {
    $this->set_js_lib($this->default_javascript_path . '/jquery_plugins/jquery.noty.js');
    $this->set_js_lib($this->default_javascript_path . '/jquery_plugins/config/jquery.noty.config.js');
    $this->set_js_lib($this->default_javascript_path . '/common/lazyload-min.js');
}

$this->set_js_lib($this->default_javascript_path . '/common/list.js');

$this->set_js($this->default_theme_path . '/bootstrap/js/cookies.js');
$this->set_js($this->default_theme_path . '/bootstrap/js/flexigrid.js');

$this->set_js($this->default_javascript_path . '/jquery_plugins/jquery.form.min.js');

$this->set_js($this->default_javascript_path . '/jquery_plugins/jquery.numeric.min.js');
$this->set_js($this->default_theme_path . '/bootstrap/js/jquery.printElement.min.js');

/** Jquery UI */
$this->load_js_jqueryui();
?>
<script type='text/javascript'>
    var base_url = '<?php echo base_url(); ?>';

    var subject = '<?php echo addslashes($subject); ?>';
    var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
    var unique_hash = '<?php echo $unique_hash; ?>';
    var export_url = '<?php echo $export_url; ?>';

    var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

</script>
<div id='list-report-error' class='report-div error'></div>
<div id='list-report-success' class='report-div success report-list' <?php if ($success_message !== null) { ?>style="display:block"<?php } ?>><?php if ($success_message !== null) { ?>
        <p><?php echo $success_message; ?></p>
    <?php }
    ?></div>

<!--fsdfs-->
<section class="content">
        <div class="card">
            <div class="card-header pt-1 pb-1">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h5 class="card-title m-0">Lista de <?php echo $subject?></h5>  
                    </div>
                    <div class="col-3">
                        <?php if (!$unset_add) { ?>
                            <a href='<?php echo $add_url ?>' title='<?php echo $this->l('list_add'); ?> <?php echo $subject ?>' class='add-anchor add_button btn btn-success floatR'>
                                <div>
                                    <span class="add"><?php echo $this->l('list_add'); ?> <?php echo $subject ?></span>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                		              
            </div>
            <div class="card-body p-2" >
                <!--fsdfs-->

                <div class="flexigrid"  data-unique-hash="<?php echo $unique_hash; ?>">
                    <div id="hidden-operations" class="hidden-operations"></div>

                    <div id='main-table-box' class="main-table-box">	
                        <div id='ajax_list' class="ajax_list">                                   
                            <?php echo $list_view ?>
                        </div>

                        <?php echo form_open($ajax_list_url, 'method="post" id="filtering_form" class="filtering_form " autocomplete = "off" data-ajax-list-info-url="' . $ajax_list_info_url . '"'); ?>
                        <div class="sDiv quickSearchBox display_none " id='quickSearchBox'>
                            <div class="form-group row mb-1 mt-1">			                        
                                <input type="text" class="qsbsearch_fieldox search_text form-control form-control-sm col-sm-4 ml-3" name="search_text" id='search_text' placeholder="<?php echo $this->l('list_search'); ?>">
                                <select name="search_field" class="form-control form-control-sm col-sm-4 ml-3" id="search_field">
                                    <option value=""><?php echo $this->l('list_search_all'); ?></option>
                                    <?php foreach ($columns as $column) { ?>
                                        <option value="<?php echo $column->field_name ?>"><?php echo $column->display_as ?>&nbsp;&nbsp;</option>
                                    <?php } ?>
                                </select>
                                <button type="button" class="crud_search btn btn-success ml-3" id='crud_search'><?php echo $this->l('list_search'); ?></button>
                                <button type="button" id='search_clear' class="search_clear btn btn-danger ml-3"><?php echo $this->l('list_clear_filtering'); ?></button>            
                            </div>           
                        </div>
                        <div class="pDiv">
                            <div class="pDiv2">
                                <div class="pGroup">
                                    <span class="pcontrol btn_lupa">&nbsp;<i class="fas fa-search"></i>&nbsp;</span>
                                    <span class="pcontrol">
                                        <?php list($show_lang_string, $entries_lang_string) = explode('{paging}', $this->l('list_show_entries')); ?>
                                        <?php echo $show_lang_string; ?>
                                        <select name="per_page" id='per_page' class="per_page">
                                            <?php foreach ($paging_options as $option) { ?>
                                                <option value="<?php echo $option; ?>" <?php if ($option == $default_per_page) { ?>selected="selected"<?php } ?>><?php echo $option; ?>&nbsp;&nbsp;</option>
                                            <?php } ?>
                                        </select>
                                        <?php echo $entries_lang_string; ?>
                                        <input type='hidden' name='order_by[0]' id='hidden-sorting' class='hidden-sorting' value='<?php if (!empty($order_by[0])) { ?><?php echo $order_by[0] ?><?php } ?>' />
                                        <input type='hidden' name='order_by[1]' id='hidden-ordering' class='hidden-ordering'  value='<?php if (!empty($order_by[1])) { ?><?php echo $order_by[1] ?><?php } ?>'/>
                                    </span>
                                </div>
                                <div class="btnseparator">
                                </div>
                                <div class="pGroup">
                                    <div class="pFirst pButton first-button">
                                        <span></span>
                                    </div>
                                    <div class="pPrev pButton prev-button">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="btnseparator">
                                </div>
                                <div class="pGroup">
                                    <span class="pcontrol"><?php echo $this->l('list_page'); ?> <input name='page' type="text" value="1" size="4" id='crud_page' class="crud_page">
                                        <?php echo $this->l('list_paging_of'); ?>
                                        <span id='last-page-number' class="last-page-number"><?php echo ceil($total_results / $default_per_page) ?></span></span>
                                </div>
                                <div class="btnseparator">
                                </div>
                                <div class="pGroup">
                                    <div class="pNext pButton next-button" >
                                        <span></span>
                                    </div>
                                    <div class="pLast pButton last-button">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="btnseparator">
                                </div>
                                <div class="pGroup">
                                    <div class="pReload pButton ajax_refresh_and_loading" id='ajax_refresh_and_loading'>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="btnseparator">
                                </div>
                                <div class="pGroup">
                                    <span class="pPageStat">
                                        <?php $paging_starts_from = "<span id='page-starts-from' class='page-starts-from'>1</span>"; ?>
                                        <?php $paging_ends_to = "<span id='page-ends-to' class='page-ends-to'>" . ($total_results < $default_per_page ? $total_results : $default_per_page) . "</span>"; ?>
                                        <?php $paging_total_results = "<span id='total_items' class='total_items'>$total_results</span>" ?>
                                        <?php
                                        echo str_replace(array('{start}', '{end}', '{results}'), array($paging_starts_from, $paging_ends_to, $paging_total_results), $this->l('list_displaying')
                                        );
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div style="clear: both;">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                    <!--exportar arquivos-->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (!$unset_add || !$unset_export || !$unset_print) { ?>
                                <?php if (!$unset_export) { ?>
                                    <a class="export-anchor floatR" href="<?php echo $export_url; ?>" download>
                                        <span class="export"><?php echo $this->l('list_export'); ?></span>
                                    </a>
                                <?php } ?>
                                <?php if (!$unset_print) { ?>
                                    <a class="print-anchor floatR" data-url="<?php echo $print_url; ?>">
                                        <span class="print"><?php echo $this->l('list_print'); ?></span>
                                    </a>
                                <?php } ?>		
                            <?php } ?>
                        </div>
                    </div>
                    <!--fim exportar-->

                </div>
            </div>
        </div>
</section>