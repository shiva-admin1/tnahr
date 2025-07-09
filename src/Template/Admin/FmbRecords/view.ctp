<style>
.bold{
	font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
<form class = 'form-horizontal col s12 m12'>
<div class="col-lg-12">
    	<div id="tab-form-actions" class="tab-pane fade active in">
      		<div class="row">
        		<div class="col-lg-11">
          			<div class="panel portlet box portlet-red">
                        <div class="portlet-header">
							<div class="caption">View FMB Records</div>
						</div>
            		
						<div class="panel-body pan">
							<div class="form-body pal">
								
								<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Details </b></legend>

									<div class="col-sm-6">
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Sub-Category <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('document_subtype_id',['class'=>'form-control name','type'=>'text','label'=>false,'error'=>false,'maxlength'=>'250','readonly'=>True,'placeholder'=>'Initial Survey','value'=>$fmbRecords['document_subtype']['name']]);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">District Name <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('district_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','readonly'=>True,'placeholder'=>'District Name','value'=>$fmbRecords['district_name']]);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Taluk Name <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('taluk_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','readonly'=>True,'placeholder'=>'Taluk Name','value'=>$fmbRecords->taluk_name]);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Village Name<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('village_name',['class'=>'form-control name','label'=>false,'error'=>false,'rows'=>'2','maxlength'=>'250','readonly'=>True,'placeholder'=>'Village Name','value'=>$fmbRecords->village_name]);?>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Village No<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('village_no',['class'=>'form-control num','label'=>false,'error'=>false,'rows'=>'2','maxlength'=>'250','readonly'=>True,'placeholder'=>'Village No','value'=>$fmbRecords->village_no]);?>
													
												</div>
											</div>
										</div>
									</div>
									</div>
									<div class="col-sm-6">
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Survey No<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('survey_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','readonly'=>True,'placeholder'=>'Survey No','value'=>$fmbRecords->survey_no]);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Keywords / Tags<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('keyword_tag',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'250','readonly'=>True,'placeholder'=>'Enter Tags seperated by comma eg: fmb,tiruppur','value'=>$fmbRecords->keyword_tag]);?>
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Year <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('year',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','readonly'=>True,'placeholder'=>'1890','value'=>$fmbRecords->year]);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Page No <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('page_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','readonly'=>True,'placeholder'=>'129','value'=>$fmbRecords->page_no]);?>
												</div>
											</div>
										</div>
									</div>
									</div>
								</fieldset>
							
								<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Image </b></legend>
							
									<div class="col-md-12">
										<div class="form-group">
										
									&nbsp;&nbsp;&nbsp;<iframe id ="current_image" allowFullScreen="true" frameborder="0" height="410px" width="950px" src="<?php echo $this->Url->build('/', true);?><?php echo $fmbRecords->file_path; ?>" title="View Record" style="border:none;"></iframe>
											
										</div>
									</div>

									
								</fieldset>

							</div>
						</div><br><br>
					</div>
				</div>
			</div>	
		</div>
  	</div>
  	</form>
</div>
<style>.disp{display:none;}</style>