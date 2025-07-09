<style type="text/css">
.error {
    color: red;
}
</style>

<div class="row">
    <?php $error = $this->Session->flash(); ?>
    <?php if($error != ''){?>
    <div class="col-lg-12">
        <div class="note note-success"> <?php echo $error;?> </div>
    </div>
    <?php }?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption"><?php echo "Taluks used in IFR/OSR"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add Taluk',array('action'=>'com_add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if(isset($taluks)){ ?>
                                <?php if(count($taluks) >0){
                                    ?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table id="table_id"
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col"><?php echo('sno') ?></th>
                                                        <th scope="col"><?php echo('Districts') ?></th>
                                                        <th scope="col"><?php echo('Taluk') ?></th>
                                                        <th scope="col" class="actions"><?php echo __('Actions') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; foreach ($taluks as $taluk): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>
                                                        <td><?php echo($taluk->district->name) ?></td>
                                                        <td><?php echo($taluk->name) ?></td>

                                                        <td class="actions center">
                                                            <?php echo $this->Html->link(__('<i class="far fa-edit"></i>&nbsp;Edit'), ['action' => 'com_edit', $taluk->id], ['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php //echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'com_view', $taluk->id], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'com_delete',  $taluk->id], ['confirm' => __('Are you sure you want to delete {0}?',  $taluk->name),'escape' => false,'class'=>'btn btn-outline-danger btn-xs']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php $sno++; endforeach; ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php } else{ print "No Data available."; }?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>