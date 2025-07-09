<style type="text/css">
    .error {

        color: red;
    }
</style>
<div class="row">
    <?php $error = $this->Session->flash(); ?>
    <?php if ($error != '') { ?>
        <div class="col-lg-12">
            <div class="note note-success"> <?php echo $error; ?> </div>
        </div>
    <?php } ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption"><?php echo "Gazettes" ?></div>
                              <!--  <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add Gazettes', array('action' => 'add'), array('escape' => false, 'class' => 'btn btn-outline-secondary', 'target' => '_blank')); ?>
                                </div>-->
                            </div>
                        </div>
                        <?php echo $this->Form->create('null', ['id' => 'FormID', 'class' => 'form-horizontal col s12 m12', "autocomplete" => "off", 'enctype' => 'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8"><label for="inputContent">Document  Type<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('document_subtype_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select Document Type', 'options' => $DocumentSubtypes,'onchange'=>'documenttype(this.value)']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <div class="input text">
                                                <?php echo $this->Form->control('year_id', ['class' => 'form-control','label' => ['text' => 'Year <span style="color:red">*</span>', 'escape' => false], 'error' => false, 'empty' => 'Select Year', 'options' => ($Years) ? $Years : '']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-10">
											<input type="hidden"  name="preId" id="preId" value="<?php echo $preId;?>">
												<input type="hidden"  name="count" id="count" value="0">
                                                <button type="submit" class="btn btn-secondary"><i
                                                        class="fas fa-search"></i>&nbsp; Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->End(); ?>

                    <?php if ($preRecords != '') {  ?>
                        <div class="panel panel-red">
                            <div class="panel-body pan">
                                <div class="form-body pal">

                                    <?php if (isset($preRecords)) { ?>
                                        <?php if (count(preRecords) > 0) {
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
                                                                        <?php echo $this->Paginator->sort('Document Type'); ?>
                                                                    </th>
                                                                    <th scope="col"><?php echo $this->Paginator->sort('Year'); ?>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <?php echo $this->Paginator->sort('Title'); ?>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <?php echo $this->Paginator->sort('Keywords'); ?>
                                                                    </th>
                                                                  
                                                              <th scope="col">
                                                                        <?php echo $this->Paginator->sort('File'); ?>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $sno = 1;
                                                                foreach ($preRecords as $ifr): ?>
                                                                    <tr>
                                                                        <td class="center"><?php echo ($sno); ?></td>
                                                                        <td><?php echo ($ifr->document_subtype->name); ?></td>
                                                                        <td><?php echo ($ifr->year); ?></td>
                                                                        <td><?php echo ($ifr->title); ?></td>
                                                                        <td class="right"><?php echo ($ifr->keywords); ?></td>
                                                                         <td class="center">
                                                                            <a target="_blank"
                                                                                href="<?php echo $this->Url->build('/', true) ?>uploads/e-Governance/<?php echo $ifr->filepath; ?><?php echo $ifr->filename; ?>"><span
                                                                                    style="color:#1ECBE4;"><i
                                                                                        class="fas fa-file-pdf"></i>&nbsp;View
                                                                                    Enclosure</span></a>
                                                                        </td>
                                                                 
                                                                    </tr>
                                                                <?php $sno++;
                                                                endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else {
                                            print "No Data available for the selection.";
                                        } ?>
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
   $(function() {
        $("#FormID").validate({
            rules: {
                'document_subtype_id': {
                    required: true
                },
               'year_id': {
                required: function () {
                    return $('#count').val() == '1';
                }
				}
            },

            messages: {
                'document_subtype_id': {
                    required: "Select Document Type"
                },
                'year_id': {
                    required: "Select Year"
                }
            },
            submitHandler: function(form) {
                form.submit();
                $(".btn").prop('disabled', true);
            }
        });
    });


    // function loadtaluk(dist_name) {
    //     $('#village').val('');
    //     var dist_name;
    //     $.ajax({
    //         async: true,
    //         dataType: "html",
    //         url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxgettaluks/" + dist_name,
    //         beforeSend: function(xhr) {
    //             xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
    //         },
    //         success: function(data, textStatus) {
    //             $('#taluk').html(data);
    //         }
    //     });


    // }

    // function loadvillage(taluk_name) {
    //     var taluk_name;
    //     $.ajax({
    //         async: true,
    //         dataType: "html",
    //         url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxgetvillages/" + taluk_name,
    //         beforeSend: function(xhr) {
    //             xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
    //         },
    //         success: function(data, textStatus) {
    //             $('#village').html(data);
    //         }
    //     });


    // }

    function documenttype(dist_id) {
        $('#year-id').html('');
		var preId=$('#preId').val();
   
        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true) ?>admin/gazettes/ajaxdocumenttypes/" + dist_id+"/"+preId,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(data, textStatus) {
			        $('#year-id').html(data);
                if ($('#year-id option').length > 1) {
					$('#count').val(1);				
				} else {
				$('#count').val(0);
				}
            }
        });


    }



    function loadvillage(taluk_id) {
        var taluk_id;
        var district_id = $('#district-id').val();
        // alert(district_id);
        // alert(taluk_id);
        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxoptionifrvillages/" + district_id + '/' + taluk_id,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(data, textStatus) {
                $('#village-id').html(data);
            }
        });


    }
</script>
