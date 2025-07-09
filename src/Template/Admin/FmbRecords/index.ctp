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
                                <div class="caption"><?php echo "FMB Records"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add FMB Record',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12"><label for="inputContent">District<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('district',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select District','options'=>$districts,'onchange'=>'loadtaluk(this.value)']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12"><label for="inputContent">Taluk<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('taluk',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Taluk','options'=>($taluks)?$taluks:'','onchange'=>'loadvillage(this.value)']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12"><label for="inputContent">Village<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('village',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Village','options'=>($villages)?$villages:'']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>'Document Type','error'=>false,'empty'=>'Select Document Type']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-10">
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

                    <?php if($fmbRecords != ''){  ?>
                    <div class="panel panel-red">
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if(isset($fmbRecords)){ ?>
                                <?php if(count($fmbRecords) >0){
							?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table id="table_id"
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col"><?php echo$this->Paginator->sort('sno') ?></th>
                                                        <th scope="col">
                                                            <?php echo$this->Paginator->sort('sub_category') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo$this->Paginator->sort('district') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo$this->Paginator->sort('taluk') ?></th>
                                                        <th scope="col">
                                                            <?php echo$this->Paginator->sort('village') ?>
                                                        </th>
                                                        <th scope="col"><?php echo$this->Paginator->sort('survey_no') ?>
                                                        </th>
                                                        <th scope="col"><?php echo$this->Paginator->sort('remarks') ?>
                                                        </th>
                                                        <th scope="col"><?php echo$this->Paginator->sort('year') ?></th>
                                                        <th scope="col"><?php echo$this->Paginator->sort('page_no') ?>
                                                        </th>
                                                        <th scope="col"><?php echo$this->Paginator->sort('Action') ?>
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; foreach ($fmbRecords as $records): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>
                                                        <td><?php echo($records['document_subtype']['name']) ?></td>
                                                        <td><?php echo($records->district_name) ?></td>
                                                        <td><?php echo($records->taluk_name) ?></td>
                                                        <td><?php echo($records->village_name) ?></td>
                                                        <td class="right"><?php echo($records->survey_no) ?></td>
                                                        <td><?php echo($records->remarks) ?></td>
                                                        <td class="center"><?php echo($records->year) ?></td>
                                                        <td class="right"><?php echo($records->page_no) ?></td>
                                                        <td class="center">
                                                            <?php echo $this->Html->link(__('<i class="far fa-edit"></i>&nbsp;Edit'), ['action' => 'edit', $records->id], ['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'view', $records->id], ['escape' => false,'class'=>'btn btn-outline-success  btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'delete',  $records->id], ['confirm' => __('Are you sure you want to delete # {0}?',  $records->name),'escape' => false,'class'=>'btn btn-outline-danger btn-xs']); ?>
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

$(function() {
    $("#FormID").validate({
        rules: {
            'district': {
                required: true
            },
            'taluk': {
                required: true
            },
            'village': {
                required: true
            }
        },

        messages: {
            'district': {
                required: "Select District"
            },
            'taluk': {
                required: "Select Taluk"
            },
            'village': {
                required: "Select Village"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});

function loadtaluk(dist_name) {
    $('#village').val('');
    var dist_name;
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/fmb_records/ajaxgettaluks/" + dist_name,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(data, textStatus) {
            $('#taluk').html(data);
        }
    });


}

function loadvillage(taluk_name) {
    var taluk_name;
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/fmb_records/ajaxgetvillages/" + taluk_name,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(data, textStatus) {
            $('#village').html(data);
        }
    });


}
</script>