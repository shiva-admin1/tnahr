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
                                <div class="caption"><?php echo "Users"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;Add User',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-success','target'=>'_blank'));?>
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
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col"><?php echo $this->Paginator->sort('sno'); ?>
                                                        </th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('role_id'); ?>
                                                        </th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('name'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('username'); ?></th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('mobile_no'); ?></th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('email'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('district_id'); ?></th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('taluk_id'); ?></th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('mobile_verified'); ?>
                                                        </th>
                                                        <th scope="col" class="actions"><?php echo ('Actions'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; 
												foreach ($users as $user): ?>
                                                    <tr>
                                                        <td><?php echo($sno); ?></td>
                                                        <td><?php echo($user->role->name); ?></td>
                                                        <td><?php echo($user->name); ?></td>
                                                        <td><?php echo($user->username); ?></td>
                                                        <td><?php echo($user->mobile_no); ?></td>
                                                        <td><?php echo($user->email); ?></td>
                                                        <td><?php echo($user->district->name); ?></td>
                                                        <td><?php echo($user->taluk->name); ?></td>
                                                        <td><?php echo($user->mobile_verified  ? __('Yes') : __('No')); ?>
                                                        </td>
                                                        <td class="actions">
                                                            <?php echo $this->Html->link(__('<i class="fa fa-edit"></i>&nbsp;Edit'), ['action' => 'edit', $user->id], ['escape' => false,'class'=>'btn btn-success btn-xs']); ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Html->link(__('<i class="fa fa-eye"></i>&nbsp;View'), ['action' => 'view', $user->id], ['escape' => false,'class'=>'btn btn-warning btn-xs']); ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Form->postLink(__('<i class="fa fa-minus"></i>&nbsp;Delete'), ['action' => 'delete',  $user->id], ['confirm' => __('Are you sure you want to delete {0}?',  $user->name),'escape' => false,'class'=>'btn btn-danger btn-xs']); ?>
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