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
                                <div class="caption"><?php echo "Indice Records"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add Indice Record',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8"><label for="inputContent">Department<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('department_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Department','options'=>$departments,'onchange'=>'loadtaluk(this.value)']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <div class="input text">
                                                <?php echo $this->Form->control('indiceyear',['class'=>'form-control ','label'=>'Year','error'=>false,'empty'=>'Select Year','options'=>($year)?$year:'']);?>
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

                    <?php if($IndicesRecords != ''){  ?>
                    <div class="panel panel-red">
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if(isset($IndicesRecords)){ ?>
                                <?php if(count($IndicesRecords) >0){
                                    
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
                                                            <?php echo $this->Paginator->sort('Department Name'); ?>
                                                        </th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('Year'); ?>
                                                        </th>                                                     
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('Enclosure'); ?></th>
                                                        <th scope="col" class="actions"><?php echo('Actions'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; foreach ($IndicesRecords as $ifr): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>
                                                        <td><?php echo($ifr->department->name); ?></td>
                                                        <td><?php echo($ifr->indiceyear); ?></td>
                                                        <td class="center">
                                                            <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $ifr->file_path; ?>"><span
                                                                    style="color:#1ECBE4;"><i
                                                                        class="fas fa-file-pdf"></i>&nbsp;View
                                                                    Enclosure</span></a>
                                                        </td>
                                                        <td class="center">
                                                            <?php  echo $this->Html->link(__('<i class="far fa-edit"></i>Edit'), ['action' => 'edit', $ifr->id],['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']) ?>
                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'view', $ifr->id], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
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

<script type="text/javascript">
        $('.datepicker10').datepicker({
    format: 'yyyy', // Ensures the displayed format is only the year
    viewMode: 'years', // Start view mode to year view
    minViewMode: 'years' // Restrict selection to year only
});

$(function() {
    $("#FormID").validate({
        rules: {
            'district': {
                required: true
            }
        },

        messages: {
            'district': {
                required: "Select District"
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
        url: "<?php echo $this->Url->build('/', true)?>admin/ifr_records/ajaxgettaluks/" + dist_name,
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
        url: "<?php echo $this->Url->build('/', true)?>admin/ifr_records/ajaxgetvillages/" + taluk_name,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(data, textStatus) {
            $('#village').html(data);
        }
    });


}
function loadtaluk(dist_name) {
    $('#indiceyear').val('');
   // var dist_name;
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/indices_records/ajaxgettaluks/" + dist_name,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(data, textStatus) {
            $('#indiceyear').html(data);
        }
    });


}
</script>