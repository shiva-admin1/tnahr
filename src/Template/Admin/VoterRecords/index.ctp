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
                                <div class="caption"><?php echo "Voter List"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add Voter List',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('constituency',['class'=>'form-control','label'=>'Constituency','error'=>false,'empty'=>'Select Constituency','options'=>$constituencys,onchange=>'loaddistrict(this.value)']);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>'Record Type','error'=>false,'empty'=>'Select Record Type']);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('district',['class'=>'form-control','label'=>'District','error'=>false,'options'=>($districts)?$districts:'','empty'=>'Select District',onchange=>'loadtaluk(this.value)']);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('taluk',['class'=>'form-control','label'=>'Taluk','error'=>false,'empty'=>'Select Taluk','options'=>($taluks)?$taluks:'',onchange=>'loadvillage(this.value)']);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('village',['class'=>'form-control','label'=>'Village','error'=>false,'options'=>($villages)?$villages:'','empty'=>'Select Village',onchange=>'showyear()']);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="input text year" <?php  if($year ==''){ ?>
                                                    style="display:none;" <?php } ?>>
                                                    <?php echo $this->Form->control('year',['class'=>'form-control','label'=>'Year','error'=>false,'empty'=>'Select Year','options'=>$years]);?>
                                                </div>
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

                    <?php if($voterRecords != ''){  ?>
                    <div class="panel panel-red">
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if(isset($voterRecords)){ ?>
                                <?php if(count($voterRecords) >0){
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
                                                            <?php echo $this->Paginator->sort('record_year'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('record_type'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('constituency_no'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('constituency'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('district'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('taluk'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('village'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('document'); ?>
                                                        </th>
                                                        <th scope="col" class="actions"><?php echo('Actions'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; foreach ($voterRecords as $voterRecord): ?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno); ?></td>
                                                        <td><?php echo $voterRecord['record_year']; ?></td>
                                                        <td><?php echo $voterRecord['doc_subtype_name']; ?></td>
                                                        <td class="right"><?php echo $voterRecord['constituency_no']; ?>
                                                        </td>
                                                        <td><?php echo $voterRecord['constituency_name']; ?></td>
                                                        <td><?php echo $voterRecord['district_name']; ?></td>
                                                        <td><?php echo $voterRecord['taluk_name']; ?></td>
                                                        <td><?php echo $voterRecord['village_name']; ?></td>
                                                        <td class="center">
                                                            <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $voterRecord['file_path']; ?>"><span
                                                                    style="color:#1ECBE4;"><i
                                                                        class="fas fa-file-pdf"></i>&nbsp;View
                                                                    Document</span></a>
                                                        </td>
                                                        <td class="center">

                                                            <?php echo $this->Html->link(__('<i class="far fa-edit"></i>Edit'), ['action' => 'edit', $voterRecord['id']],['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'view', $voterRecord['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'delete',  $voterRecord['id']], ['confirm' => __('Are you sure you want to delete {0}?', $voterRecord['constituency_no']),'escape' => false,'class'=>'btn btn-outline-danger btn-xs']); ?>
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
            'constituency': {
                required: false
            },
            'district': {
                required: false
            },
            'taluk': {
                required: false
            },
            'village': {
                required: false
            },
            'document_subtype_id': {
                required: false
            }
        },

        messages: {
            'constituency': {
                required: "Enter Constituency"
            },
            'district': {
                required: "Select District"
            },
            'taluk': {
                required: "Select Taluk"
            },
            'village': {
                required: "Select Village"
            },
            'document_subtype_id': {
                required: "Select Record"
            },
        },
        submitHandler: function(form) {
            var con_name = $('#constituency').val();
            var doc_type = $('#document-subtype-id').val();
            if ((con_name != '') || (doc_type != '')) {
                form.submit();
                $(".btn").prop('disabled', true);

            } else {
                alert("Select Constituency or Document Type!");
                return false;
            }
        }
    });
});


function loaddistrict(con_name) {
    $('#taluk').val('');
    var con_name;
    //alert(con_name);
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/voter_records/ajaxgetdistricts/" + con_name,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(data, textStatus) {
            $('#district').html(data);
        }
    });


}

function loadtaluk(dist_name) {
    $('#village').val('');
    var dist_name;
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/voter_records/ajaxgettaluks/" + dist_name,
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
        url: "<?php echo $this->Url->build('/', true)?>admin/voter_records/ajaxgetvillages/" + taluk_name,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(data, textStatus) {
            $('#village').html(data);
        }
    });


}

function showyear() {

    $('.year').show();

}
</script>