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
                                <div class="caption"><?php echo "Board Proceedings"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>&nbsp;Add BP Record',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8"> <label for="inputContent">Record Type<span class="require">&nbsp;*</span></label>

                                            <div class="input text">
                                                <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Record Type']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-secondary"><i
                                                        class="fas fa-search"></i>&nbsp; Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->End();?>

                    <?php if($bpRecords != ''){  ?>
                    <div class="panel panel-red">
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if(isset($bpRecords)){ ?>
                                <?php if(count($bpRecords) >0){
							?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table id="table_id"
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col"><?php echo $this->Paginator->sort('sno'); ?>
                                                        </th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('Record_type'); ?>
                                                        </th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('BP_NO'); ?>
                                                        </th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('BP_Date'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('Enclosure'); ?></th>
                                                        <th scope="col" class="actions"><?php echo('Actions'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; foreach ($bpRecords as $bp): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>
                                                        <td><?php echo($bp->document_subtype->name); ?></td>
                                                        <td class="right"><?php echo($bp->bp_no); ?></td>
                                                        <td class="center">
                                                            <?php echo date('d-m-Y',strtotime($bp->bp_date)); ?></td>
                                                        <td class="center"> <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $bp['file_path']; ?>"><span
                                                                    style="color:#1ECBE4;"><i
                                                                        class="fas fa-file-pdf"></i>&nbsp;View
                                                                    Enclosure</span>
                                                            </a></td>
                                                        <td class="center">

                                                            <?php echo $this->Html->link(__('<i class="far fa-edit"></i>Edit'), ['action' => 'edit', $bp->id],['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']) ?>
                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'view', $bp->id], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>

                                                            <?php echo $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'delete',  $bp->id], ['confirm' => __('Are you sure you want to delete BP No: {0}?',  $bp->bp_no),'escape' => false,'class'=>'btn btn-outline-danger btn-xs']); ?>

                                                        </td>
                                                    </tr>
                                                    <?php $sno++; endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php } else{ print "No Data available for the selection."; }?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $("#FormID").validate({
        rules: {
            'document_subtype_id': {
                required: true
            }
        },

        messages: {
            'document_subtype_id': {
                required: "Select Record Type"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
</script>