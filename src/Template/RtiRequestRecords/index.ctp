<style type="text/css">
.error {
    color: red;
}
</style>
<div class="row" style="margin-left:20px;">
    <?php $error = $this->Session->flash(); ?>
    <?php if($error != ''){?>
    <div class="col-lg-12">
        <div class="note note-success"> <?php echo $error;?> </div>
    </div>
    <?php }?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel panel-red">
                        <div class="portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption"><?php echo "Record Request Details"?></div>                             
                            </div>
                        </div>       
                 	<div class="panel-body pan">
						<div class="form-body pal">

							<?php if(isset($rtiRequestRecords)){ ?>
							<?php if(count($rtiRequestRecords) >0){
							?>

							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive" style="overflow:auto">
										<table id="table_id"
											class="table table-hover table-striped table-bordered table-advanced tablesorter display">
											<thead class="info">
												<tr>
													<th >S No</th>
													<th>
														Application Reference No
													</th>
													<th >
														Application Date
													</th>
													<th>
														Deadline Date
													</th>
													<th >
														Document Type
													</th>
													<th>
														Application Status
													</th>                                                        
													 <th >
														Action
													</th>
												</tr>

											</thead>
											<tbody>
												<?php $sno =1; foreach ($rtiRequestRecords as $rtiRequestRecord): ?>
												<tr>
													<td><?php echo($sno); ?></td>
													<td><?php echo $rtiRequestRecord['application_reference_no'] ?></td>
													<td class="center"><?php echo date('d-m-Y',strtotime($rtiRequestRecord['application_date'])) ?></td>                                                       
													<td class="center" style="color:green;"><b><?php echo date('d-m-Y',strtotime($rtiRequestRecord['deadline_date'])) ?></b></td>                                                       
													<td><?php echo $rtiRequestRecord['document_type']['name']; ?></td>                                                      
													<td class="center"><?php echo "Application Submitted"; ?></td>
													<td class="center">
														<?php echo $this->Html->link(__('<i class="fa fa-eye"></i>&nbsp;View'), ['action' => 'view', $rtiRequestRecord['id']], ['escape' => false,'class'=>'btn btn-outline-primary  btn-xs']) ?>
														&nbsp;
														<?php //echo $this->Html->link(__('<i class="fa fa-eye"></i>&nbsp;Pay'), [ $rtiRequestRecord['id']], ['escape' => false,'class'=>'btn btn-outline-success  btn-xs']) ?>
												
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
            </div>
        </div>
    </div>
</div>
</div>

