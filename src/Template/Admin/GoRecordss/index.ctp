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
                                <div class="caption"><?php echo "Government Orders"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add Government Order',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>

                            </div>
                        </div>
                        <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>'Record Type','error'=>false,'empty'=>'Select Record Type']);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-md-12"><label for="inputContent">Department<span class="require">&nbsp;*</span></label>
                                                <div class="input text">
                                                    <?php echo $this->Form->control('go_department_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Department']);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col-md-6">
                                            <div class="form-actions text-right none-bg">
                                                <div class="col-md-offset-1 col-md-8" style="margin-top:15px">
                                                    <button type="submit" class="btn btn-secondary"><i
                                                            class="fas fa-search"></i>&nbsp; Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php echo $this->Form->End();?>

                    <?php if($goRecords != ''){  ?>
                    <div class="panel panel-red">
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if(isset($goRecords)){ ?>
                                <?php if(count($goRecords) >0){
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
                                                        <th scope="col">
                                                            <?php echo 'Record Type'; ?></th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('department'); ?>
                                                        </th>
                                                        <th scope="col"><?php echo 'GO NO'; ?>
                                                        </th>
                                                        <th scope="col"><?php echo 'GO Date'; ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('subject'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('Abstract_Copy'); ?></th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('Full_GO_Copy'); ?></th>
                                                        <th scope="col" class="actions"><?php echo('Actions'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; foreach ($goRecords as $go): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>
                                                        <td><?php echo $go['doc_subtype_name']; ?></td>
                                                        <td><?php echo $go['go_dept_name']; ?></td>
                                                        <td class="right"><?php echo $go['go_no']; ?></td>
                                                        <td class="right">
                                                            <?php echo date('d-m-Y',strtotime($go['go_date'])); ?></td>
                                                        <td><?php echo $go['abstract_subject']; ?></td>
                                                        <td class="center">
                                                            <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $go['abstract_file_path']; ?>"><span
                                                                    style="color:#1ECBE4;"><i
                                                                        class="fas fa-file-pdf"></i>&nbsp;View
                                                                    Abstract</span></a>
                                                        </td>
                                                        <td class="center">
                                                            <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $go['fulldoc_file_path']; ?>"><span
                                                                    style="color:#1ECBE4;"><i
                                                                        class="fas fa-file-pdf"></i>&nbsp;View
                                                                    Full GO</span></a>
                                                        </td>
                                                        <td class="center">

                                                            <?php echo $this->Html->link(__('<i class="far fa-edit"></i>Edit'), ['action' => 'edit', $go['id']],['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'view', $go['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'delete',  $go['id']], ['confirm' => __('Are you sure you want to delete GO No: {0}?',  $go['go_no']),'escape' => false,'class'=>'btn btn-outline-danger btn-xs']); ?>
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
            'go_department_id': {
                required: true
            }
        },

        messages: {
            'go_department_id': {
                required: "Select Department"
            }
        },
        submitHandler: function(form) {
            form.submit();


        }
    });
});
</script>