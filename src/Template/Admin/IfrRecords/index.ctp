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
                                <div class="caption"><?php echo "IFR Records" ?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add IFR Record', array('action' => 'add'), array('escape' => false, 'class' => 'btn btn-outline-secondary', 'target' => '_blank')); ?>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->create('', ['id' => 'FormID', 'class' => 'form-horizontal col s12 m12', "autocomplete" => "off", 'enctype' => 'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8"><label for="inputContent">District<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('district_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select District', 'options' => $districts, 'onchange' => 'loadtaluk(this.value)']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <div class="input text">
                                                <?php echo $this->Form->control('taluk_id', ['class' => 'form-control', 'label' => 'Taluk', 'error' => false, 'empty' => 'Select Taluk', 'options' => ($taluks) ? $taluks : '', 'onchange' => 'loadvillage(this.value)']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <div class="input text">
                                                <?php echo $this->Form->control('village_id', ['class' => 'form-control', 'label' => 'Village', 'error' => false, 'empty' => 'Select Village', 'options' => ($villages) ? $villages : '']); ?>
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
                    <?php echo $this->Form->End(); ?>

                    <?php if ($ifrRecords != '') {  ?>
                        <div class="panel panel-red">
                            <div class="panel-body pan">
                                <div class="form-body pal">

                                    <?php if (isset($ifrRecords)) { ?>
                                        <?php if (count($ifrRecords) > 0) {
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
                                                                        <?php echo $this->Paginator->sort('district'); ?>
                                                                    </th>
                                                                    <th scope="col"><?php echo $this->Paginator->sort('taluk'); ?>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <?php echo $this->Paginator->sort('village'); ?>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <?php echo $this->Paginator->sort('title_deed_no'); ?>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <?php echo $this->Paginator->sort('sheet_no'); ?>
                                                                    </th>
                                                                    <th scope="col">
                                                                        <?php echo $this->Paginator->sort('Enclosure'); ?></th>
                                                                    <!-- <th scope="col">
                                                            <?php echo $this->Paginator->sort('village_name'); ?></th> -->
                                                                    <th scope="col" class="actions"><?php echo ('Actions'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $sno = 1;
                                                                foreach ($ifrRecords as $ifr): ?>
                                                                    <tr>
                                                                        <td class="center"><?php echo ($sno); ?></td>
                                                                        <td><?php echo ($ifr->district_name); ?></td>
                                                                        <td><?php echo ($ifr->taluk_name); ?></td>
                                                                        <td><?php echo ($ifr->village_name); ?></td>
                                                                        <td class="right"><?php echo ($ifr->title_deed_no); ?></td>
                                                                        <td class="right"><?php echo ($ifr->sheet_no); ?></td>
                                                                        <td class="center">
                                                                            <a target="_blank"
                                                                                href="<?php echo $this->Url->build('/', true) ?><?php echo $ifr->file_path; ?>"><span
                                                                                    style="color:#1ECBE4;"><i
                                                                                        class="fas fa-file-pdf"></i>&nbsp;View
                                                                                    Enclosure</span></a>
                                                                        </td>
                                                                        <td class="center">

                                                                            <?php echo $this->Html->link(__('<i class="far fa-edit"></i>Edit'), ['action' => 'edit', $ifr->id], ['escape' => false, 'class' => 'btn btn-outline-info btn-xs', 'target' => '_blank']) ?>
                                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'view', $ifr->id], ['escape' => false, 'class' => 'btn btn-outline-success btn-xs', 'target' => '_blank']); ?>

                                                                            <?= $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'delete',  $ifr->id], ['confirm' => __('Are you sure you want to delete Sheet No: {0}?',  $ifr->sheet_no), 'escape' => false, 'class' => 'btn btn-outline-danger btn-xs']); ?>

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
                'district_id': {
                    required: true
                },
                'taluk': {
                    required: false
                },
                'village': {
                    required: false
                }
            },

            messages: {
                'district_id': {
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

    function loadtaluk(dist_id) {
        $('#village-id').val('');
        var dist_id;
        // alert(dist_id);

        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxoptionifrtaluk/" + dist_id,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(data, textStatus) {
                // alert(data);
                $('#taluk-id').html(data);
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