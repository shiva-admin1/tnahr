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
                                <div class="caption"><?php echo "Pre 1857 records(1670 to 1857 A.D)"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add Record',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>

                        <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
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
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('department',['class'=>'form-control','label'=>'Department','error'=>false,'options'=>$departments,'empty'=>'Select Department']);?>
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
                    <?php echo $this->Form->End();?>

                    <?php if($beicRecords != ''){  ?>
                    <div class="panel panel-red">
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if(isset($beicRecords)){ ?>
                                <?php if(count($beicRecords) >0){
							?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table id="table_id"
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col"><?php echo $this->Paginator->sort('sno') ?></th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('record_type') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('department') ?>
                                                        </th>

                                                        <th scope="col"><?php echo $this->Paginator->sort('from Date') ?>
                                                        </th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('to Date') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('general_no') ?></th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('volume_no') ?></th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('Enclosure') ?>
                                                        </th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('Action') ?>
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; foreach ($beicRecords as $beicRecord): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>
                                                        <td><?php echo $beicRecord['doc_subtype_name']; ?></td>
                                                        <td><?php echo $beicRecord['department']; ?></td>
                                                        <td class="center">
                                                            <?php echo date('d-m-Y',strtotime($beicRecord['fromdate'])) ?>
                                                        </td>
                                                        <td class="center">
                                                            <?php echo date('d-m-Y',strtotime($beicRecord['todate'])) ?>
                                                        </td>
                                                        <td class="right"><?php echo $beicRecord['general_no'] ?></td>
                                                        <td class="right"><?php echo $beicRecord['volume_no'] ?></td>
                                                        <td class="center"> <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $beicRecord['file_path']; ?>"><span
                                                                    style="color:#1ECBE4;"><i
                                                                        class="fas fa-file-pdf"></i>&nbsp;View
                                                                    Enclosure</span>
                                                            </a></td>
                                                        <td class="center">
                                                            <?php echo $this->Html->link(__('<i class="far fa-edit"></i>&nbsp;Edit'), ['action' => 'edit', $beicRecord['id']],['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'view', $beicRecord['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'delete',  $beicRecord['id']], ['confirm' => __('Are you sure you want to delete General No: {0}?',  $beicRecord['general_no']),'escape' => false,'class'=>'btn btn-outline-danger btn-xs']); ?>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        //"sScrollY": "600px",
        //	"sScrollX": "100%",
        "bScrollCollapse": true,
        "bPaginate": true,
        "searching": true,
        "fixedColumns": {
            leftColumns: 2
        }

    });
});
</script>
<script>
$(function() {
    $("#FormID").validate({
        rules: {
            'document_subtype_id': {
                required: false
            },
            'department': {
                required: false
            }
        },

        messages: {
            'document_subtype_id': {
                required: "Select Document Subtype"
            },
            'department': {
                required: "Select Department"
            }
        },
        submitHandler: function(form) {
            var doc_type = $('#document-subtype-id').val();
            var dept = $('#department').val();
            if ((doc_type != '') || (dept != '')) {
                form.submit();
                $(".btn").prop('disabled', true);

            } else {
                alert("Select atleast one field!");
                return false;
            }
        }
    });
});

// function loaddept(dept) {
//     // $('#go-department-id').val('');
//     var dept;
//     $.ajax({
//         async: true,
//         dataType: "html",
//         url: "<?php echo $this->Url->build('/', true)?>admin/beic_records/ajaxgetdepts/" + dept,
//         beforeSend: function(xhr) {
//             xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
//         },
//         success: function(data, textStatus) {
//             $('#dept').html(data);
//         }
//     });


// }
</script>