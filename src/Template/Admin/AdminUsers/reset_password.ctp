<div class="row">
  	<?php echo $this->Form->create('User',['class'=>'form-horizontal', 'id'=>'ChangePasswordForm','novalidate'=>'novalidate']); ?>
  	<div class="col-lg-8">
    	<div id="tab-form-actions" class="tab-pane fade active in">
      		<div class="row">
        		<div class="col-lg-offset-3 col-lg-10">
          			<div class="panel panel-blue">
            			<div class="panel-heading" style="color:black;"><b>Password Reset</b></div>
            			<div class="panel-body pan">
              				<div class="form-body pal">
								<div class="form-group">
									<div class="col-md-4"><b><font face="Verdana" size="2">Roles</font></b></div>
                  					<div class="col-md-7">
                    					<div class="input text"> <?php echo $this->Form->input('role_id',['class'=>'form-control','label'=>false,'error' => false,'empty'=>'Select','options'=>['1'=>'Allottee','2'=>'PO']]);?> </div>
                  					</div>
                				</div>
								<div class="form-group">
									<div class="col-md-4"><b><font face="Verdana" size="2">Username</font></b></div>
                  					<div class="col-md-7">
                    					<div class="input text"> <?php echo $this->Form->input('username',['class'=>'form-control','label'=>false,'error' => false,'type'=>'text']);?> </div>
                  					</div>
                				</div>
                			</div>
            			</div>
          			</div>
        		</div>
      		</div>
    	</div>	
  	</div>
  	<div class="col-lg-12">
    	<div class="form-actions text-right none-bg">
      		<div class="col-md-6">
        		<button type="submit" class="btn btn-primary" >Submit</button>
        		<!--button type="button" class="btn" onclick="javascript:location.reload();">Reset</button-->
      		</div>
    	</div>
  	</div><br>
  	<?php echo $this->Form->End();?> 
</div>

<?php //if(count($users)!= 0 ) {?>
<!--div class="row">
  	<div class="col-lg-12">
    	<div><?php echo (@$error)?$error:''; ?></div>
		<div class="portlet box portlet-red">
      		<div class="portlet-header">
		        <div class="caption">Users</div>
			</div>
		 
		 <div id="report_1">
		  <div class="portlet-body">
        		<div class="row mbm">
          			<div class="col-lg-12">
            			<div class="table-responsive">
              				<table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                				<thead class="info">
                  					<tr>
										<th>S.No</th>
										<th width="10%">Name</th>
										<th width="10%">Mobile No</th>
										<th width="10%">Company Name</th>
										<?php if($role!=2) { ?><th>Email</th><?php } ?>
										<th>Registered Date</th>
										<th>Reset Password</th>
									</tr>
                				</thead>
	                			<tbody>
				  					<?php $i=1; 
										 foreach ($users as $user): ?> 
									<tr>
										<td><?php echo  $i; ?></td>
										<td><?php echo  $user->username ?>&nbsp;</td>	
										<td><?php echo  $user->mobile ?>&nbsp;</td>	
										<td><?php echo  $user->allottee_name ?>&nbsp;</td>	
										<?php if($role!=2) { ?><td><?php echo  $user->email ?>&nbsp;</td><?php } ?>	
										<td><?php echo  date("d-m-Y",strtotime($user->created_date))!="01-01-1970" ? date("d-m-Y",strtotime($user->created_date)) :'' ; ?>&nbsp;</td>
										<td><?= $this->Html->link(__('<i class="fa fa-pencil"></i>Reset password'), ['action' =>'userDetails/'.$user->id.'/'.$role],['escape' => false,'class'=>'btn btn-success btn-xs']) ?></td>										
									</tr>
	                  				<?php $i++; endforeach; ?>
	                			</tbody>
	              			</table>
            			</div>
          			</div>
        		</div>
      		</div>
    	</div>
       </div>
  	</div>
</div-->
 <?php // } ?> 		
  	
<script>
$(function() {
	$.validator.addMethod("atLeastOneLowercaseLetter", function (value, element) {
		return this.optional(element) || /[a-z]+/.test(value);
	}, "<br />Must have at least one lowercase letter");

	$.validator.addMethod("atLeastOneUppercaseLetter", function (value, element) {
		return this.optional(element) || /[A-Z]+/.test(value);
	}, "<br />Must have at least one uppercase letter");
	 

	$.validator.addMethod("atLeastOneNumber", function (value, element) {
		return this.optional(element) || /[0-9]+/.test(value);
	}, "<br />Must have at least one number");
	 

	$("#ChangePasswordForm").validate({
		rules								: {
			'username'  					    : {
				required        			: true
			},
			'role_id'  					    : {
				required        			: true
			}
			
		},
		messages: {
			'username' 						: {
				 required        			: "Enter Username",
			},
			'role_id' 						: {
				 required        			: "Select Role",
			}
		},
		submitHandler: function(form) {
			form.submit();  
		}
	});
});
</script>