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
                                <div class="caption"><?php echo "Districts used in OSR" ?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add OSR District', array('action' => 'osr_add'), array('escape' => false, 'class' => 'btn btn-outline-secondary', 'target' => '_blank')); ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if (isset($districts)) { ?>
                                    <?php if (count($districts) > 0) {
                                    ?>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive" style="overflow:auto">
                                                    <table id="table_id"
                                                        class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                        <thead class="info">
                                                            <tr>
                                                                <th scope="col"><?php echo ('sno') ?></th>
                                                                <th scope="col"><?php echo ('Districts') ?></th>

                                                                <!--th scope="col"><?php echo ('Code') ?></th-->


                                                                <th scope="col" class="actions"><?php echo __('Actions') ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $sno = 1;
                                                            foreach ($districts as $district): ?>
                                                                <tr>
                                                                    <td class="center"><?php echo ($sno); ?></td>
                                                                    <td><?php echo ($district->name) ?></td>

                                                                    <!--td class="right"><?php echo ($district->code) ?></td-->

                                                                    <td class="actions center">
                                                                        <?php echo $this->Html->link(__('<i class="far fa-edit"></i>&nbsp;Edit'), ['action' => 'osr_edit', $district->id], ['escape' => false, 'class' => 'btn btn-outline-info btn-xs', 'target' => '_blank']) ?>

                                                                        <?php //echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'com_view', $district->id], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']) 
                                                                        ?>
                                                                        &nbsp;&nbsp;
                                                                        <?php echo $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'osr_delete',  $district->id], ['confirm' => __('Are you sure you want to delete {0}?',  $district->name), 'escape' => false, 'class' => 'btn btn-outline-danger btn-xs']); ?>
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
                                        print "No Data available.";
                                    } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>