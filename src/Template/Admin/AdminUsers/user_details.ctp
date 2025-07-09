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
                            </div>
                        </div>   
						  <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
							    <div class="col-md-12">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12"> <label for="inputContent">District<span class="require">&nbsp;</span></label>

                                            <div class="input text">
                                                <?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'-All-','options'=>$districts]);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
                                </div>							
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-10">
                                                <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i>&nbsp; Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->End();?>
                    <div class="row">                  
                  	<div class="col-lg-12">
					   <?php if($users != ''){  ?>
                           <?php if(count($users) != 0){  ?>
						<div class="panel panel-red">						   
							<div class="panel-body pan">
								<div class="form-body pal">				

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table id="table_id"
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col"><?php echo ('Sno'); ?>
                                                        </th>                                                       
                                                        <th scope="col"><?php echo ('Name'); ?>
                                                        </th>                                                       
                                                        <th scope="col">
                                                            <?php echo ('Mobile No'); ?></th>
                                                        <th scope="col"><?php echo ('Email'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo ('District'); ?></th>
                                                        <th scope="col">
                                                            <?php echo ('Taluk'); ?></th>
                                                        <th scope="col" class="actions"><?php echo ('Actions'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; 
												foreach ($users as $user): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>                                                      
                                                        <td><?php echo($user->name); ?></td>                                                     
                                                        <td class="right"><?php echo($user->mobile_no); ?></td>
                                                        <td><?php echo($user->email); ?></td>
                                                        <td><?php echo($user->district->name); ?></td>
                                                        <td><?php echo($user->taluk->name); ?></td>
                                                        <td class="center">
                                                            &nbsp;&nbsp;
                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'user_view', $user->id], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
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
					<?php }else{ echo "No Record Found"; } } ?>	
                </div>
            </div>
        </div>
    </div>
</div>
</div>