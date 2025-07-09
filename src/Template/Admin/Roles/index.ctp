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
                                <div class="caption"><?php echo "Roles"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-user-plus"></i>&nbsp;Add Role',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table id="table_id"
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class='info'>
                                                    <tr>
                                                        <th scope="col"><?php echo('Sno'); ?>
                                                        </th>
                                                        <th scope="col"><?php echo('Role'); ?>
                                                        </th>
                                                        <th scope="col" class="actions"><?php echo ('Actions'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno =1;
                                                    foreach ($roles as $role): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>
                                                        <td><?php echo($role->name) ?></td>
                                                        <td class="center">
                                                            <?php echo $this->Html->link(__('<i class="fas fa-user-edit"></i>&nbsp;Edit'), ['action' => 'edit', $role->id], ['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']); ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Html->link(__('<i class="fas fa-eye"></i>&nbsp;View'), ['action' => 'view', $role->id], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Form->postLink(__('<i class="fas fa-user-alt-slash"></i>&nbsp;Delete'), ['action' => 'delete',  $role->id], ['confirm' => __('Are you sure you want to delete {0}?',  $role->name),'escape' => false,'class'=>'btn btn-outline-danger btn-xs']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php $sno++; endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>