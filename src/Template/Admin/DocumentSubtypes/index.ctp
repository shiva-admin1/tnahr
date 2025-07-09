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
                                <div class="caption"><?php echo "Record Subtypes"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add Record Subtype',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <?php if(isset($documentSubtypes)){ ?>
                                <?php if(count($documentSubtypes) >0){ ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="table_id"
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col"><?php echo('Sno') ?></th>
                                                        <th scope="col"><?php echo('Record Types') ?></th>
                                                        <th scope="col"><?php echo('Record Subtypes') ?></th>
                                                        <th scope="col"><?php echo('Code') ?></th>
                                                        <th scope="col" class="actions"><?php echo __('Actions') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno=1; foreach ($documentSubtypes as $documentSubtype): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>
                                                        <td><?php echo($documentSubtype->document_type->name) ?></td>
                                                        <td><?php echo($documentSubtype->name) ?></td>
                                                        <td class="center"><?php echo($documentSubtype->code) ?></td>
                                                        <td class="center">
                                                            <?php echo $this->Html->link(__('<i class="far fa-edit"></i>&nbsp;Edit'), ['action' => 'edit', $documentSubtype->id], ['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'view', $documentSubtype->id], ['escape' => false,'class'=>'btn btn-outline-success  btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'delete',  $documentSubtype->id], ['confirm' => __('Are you sure you want to delete {0}?',  $documentSubtype->name),'escape' => false,'class'=>'btn btn-outline-danger btn-xs']); ?>
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