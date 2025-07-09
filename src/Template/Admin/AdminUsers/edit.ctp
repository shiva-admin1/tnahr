<style>
.bold {
    font-weight: bold;
}

.dept {
  background-color: #e8f1f8;
  width : 210px; 
  height : 100px; 
  border: 1px solid grey;
  padding: 10px;
  margin: 15px;
  margin-top :0px;
  margin-bottom :0px;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php $error = $this->Session->flash(); ?>
    <?php if($error != ''){?>
    <div class="col-lg-12">
        <div class="note note-success"> <?php echo $error;?> </div>
    </div>
    <?php }?>
    <form id ="FormID" class='form-horizontal col s12 m12' method="post">
        <div class="col-lg-12">
            <div id="tab-form-actions" class="tab-pane fade active in">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="panel portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption">Edit Admin User</div>
                            </div>

                            <div class="panel-body pan">
                                <div class="form-body pal">

                                    <fieldset
                                        style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                        <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Admin User
                                                Details
                                            </b></legend>

                                        <div class="col-sm-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Role<span
                                                            class="require">&nbsp;*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('role_id',['class'=>'form-control','label'=>false,'error'=>false,'maxlength'=>'250','value' =>$adminUsers->role_id]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($adminUsers->role_id == 5 || $adminUsers->role_id == 9){  ?>
                                            <div class="col-md-12 section_ass">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">Department Sections
                                                        <span class="require">&nbsp;*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('department_section_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Department Section','options'=>$departmentSections,'value' =>$adminUsers->department_section_id]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php  } ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Username<span
                                                            class="require">&nbsp;*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('username',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$adminUsers->username]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Name<span
                                                            class="require">&nbsp;*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$adminUsers->name]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">Mobile
                                                        Number<span class="require">&nbsp;*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('mobile_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'10','value'=>$adminUsers->mobile_no]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Email<span
                                                            class="require">&nbsp;*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('email',['class'=>'form-control','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$adminUsers->email]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                             <?php if($adminUsers->role_id == 5 || $adminUsers->role_id == 9){  ?>
                                            <div class="col-md-12 section_ass">
												 <div class="form-group">
													<label for="inputContent" class="col-md-4 control-label bold">Document Types
													<span class="require"></span></label>
													<div class="col-md-6 dept">
													    <?php $i=1; foreach($doc_types as $doc_type){                                                           	
															 echo $i.".&nbsp;&nbsp;".$doc_type['name']."</br>";    
															$i++; }  ?>													  
													</div>											
												</div>
											</div>
											<?php  } ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Address
                                                        <span class="require">&nbsp;*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('address',['class'=>'form-control','type'=>'textarea','label'=>false,'error'=>false,'placeholder'=>'Residential Address','rows'=>4,'style'=>'resize: vertical;','value'=>$adminUsers->address]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">District<span
                                                            class="require">&nbsp;*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>$districts,'empty'=>'Select District','value'=>$adminUsers->district_id]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Taluk<span
                                                            class="require">&nbsp;*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('taluk_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>$taluks,'empty'=>'Select Taluk','value'=>$adminUsers->taluk_id]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="col-lg-7">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-secondary">Submit</button>&nbsp;&nbsp;
                                                <button type="reset" class="btn btn-warning">Reset</button>
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
    </form>
</div>
<style>
.disp {
    display: none;
}
</style>
<script>
$(function() {
    $("#FormID").validate({
        rules: {
            'role_id': {
                required: true
            },

            'username': {
                required: true
            },

            'name': {
                required: true
            },

            'password': {
                required: true
            },

            'mobile_no': {
                required: true
            },

            'email': {
                required: true
            },

            'address': {
                required: true
            },

            'district_id': {
                required: true
            },

            'taluk_id': {
                required: true
            },

            'department_section_id': {
                required: true
            }
        },

        messages: {
            'role_id': {
                required: "Select Role!"
            },

            'username': {
                required: "Enter a Username!"
            },

            'name': {
                required: "Enter a Fullname!"
            },

            'password': {
                required: "Enter a Password!"
            },

            'mobile_no': {
                required: "Enter a Mobile Number!"
            },

            'email': {
                required: "Enter a Email!"
            },

            'address': {
                required: "Enter a Address!"
            },

            'district_id': {
                required: "Select District!"
            },

            'taluk_id': {
                required: "Select Taluk!"
            },

            'department_section_id': {
                required: "Select Department Section!"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});



$('#district-id').change(function() {
	 var district_id    = $('#district-id').val();	 
	 if(district_id != ''){
		$.ajax({
			async: true,
			dataType: "html",
			url: "<?php echo $this->Url->build('/', true)?>admin/admin_users/ajaxgettaluk/" + district_id,
			method: 'get',
			success: function(data, textStatus) { //alert();
				$('#taluk-id').html(data);
			}
		});
     }
});



$('#role-id').change(function() {
	 var role    = $('#role-id').val();	 
	 if(role == 5 || role == 9){
		$('.section_ass').show();
     }else{
	   	$('#department-section-id').val(''); 
		$('.dept').html('');
		$('.section_ass').hide(); 		 
	 }
});


$('#department-section-id').change(function() { 
	 var dept_sec   = $('#department-section-id').val();	 
	 if(dept_sec != ''){
		$.ajax({
			async: true,
			dataType: "html",
			url: "<?php echo $this->Url->build('/', true)?>admin/admin_users/ajaxgetdoctypes/" + dept_sec,
			method: 'get',
			success: function(data, textStatus) { //alert();
				$('.dept').html(data);
			}
		});		
	 }else{	   
		$('.dept').html('');		
	 }   
});
</script>