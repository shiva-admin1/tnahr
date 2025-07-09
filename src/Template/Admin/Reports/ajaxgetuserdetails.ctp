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
                    
                        <div class="portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption"><?php echo $users[0]['district']['name']." Users"?></div>								
                            </div>
                        </div> 
					 <div class="row">                  
                  	<div class="col-lg-12">
					   <?php if($users != ''){  ?>                        
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
														<th scope="col"><?php echo ('Address'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo ('District'); ?></th>
                                                        <th scope="col">
                                                            <?php echo ('Taluk'); ?></th>                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; 
												foreach ($users as $user): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>                                                      
                                                        <td><?php echo($user->name); ?></td>                                                     
                                                        <td class="center"><?php echo($user->mobile_no); ?></td>
                                                        <td><?php echo($user->email); ?></td>
                                                        <td><?php echo($user->address); ?></td>
                                                        <td><?php echo($user->district->name); ?></td>
                                                        <td><?php echo($user->taluk->name); ?></td>                                                       
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
				<?php } ?>					
                </div>
            </div>
       
    </div>
</div>
</div>
</div>
</div>