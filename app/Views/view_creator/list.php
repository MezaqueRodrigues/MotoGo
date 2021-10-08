<section class="content">
  <div class="card">
      <div class="card-header pt-1 pb-1">
          <div class="row align-items-center">
              <div class="col-9">
                  <?= isset($subject) ? $subject : "" ?>
              </div>
              <div class="col-3 d-flex justify-content-end">   
                  <?php if($addCreate): ?>                    
                    <a href='<?= isset($controller_url) ? $controller_url : "" ?>/add' class='add-anchor add_button btn btn-success'>                               
                            Adicionar <?= isset($subject) ? $subject : "" ?>                          
                    </a>        
                    <?php endif; ?>                
              </div>
          </div>                		              
      </div>
      <div class="card-body p-2 flexigrid" >

      <table class="table table-bordered table-striped tablecrud" id="ViewCreator">
          <thead>
              <tr>
                  <?php foreach ($columns as $column): ?>
                      <th>
                          <?php echo $column ?>
                      </th>
                  <?php endforeach ?>
                  <th class="d-flex justify-content-end">
                      Ações
                  </th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $d): ?> 
                <tr>
                    <?php foreach ($columns as $key => $column): ?>
                        <td>
                            <?php echo $d[$key] ?>
                        </td>
                    <?php endforeach ?>
                    <td class="d-flex justify-content-end">
                        <?php foreach ($action as $a): ?>
                            <?php if($a["show"] == null || $a["show"]($d[$id])):?>                              
                                <a href="<?= $a['url']."/".$d[$id] ?>" class="pt-1 pl-1 pr-1 text-dark <?= $a['icon'] ?>" title="<?= $a["label"] ?>"></a>
                            <?php endif; ?>    
                        <?php endforeach; ?>
                    </td>
                </tr>
            <?php endforeach;?>


          </tbody>
        </table>

      </div>
  </div>
