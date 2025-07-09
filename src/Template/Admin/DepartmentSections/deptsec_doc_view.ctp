<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($departmentSection,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Department Section and Record Type Mapping</div>
                        </div>

                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>  
                                             </b></legend>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
													class="col-md-4 control-label bold">Department Section <span
														class="require"></span></label>
                                                    <div class="col-md-5">
                                                        <div class="input text">
                                                             <?php echo $departmentname; ?>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
										 <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
													class="col-md-4 control-label bold">Record Types<span
														class="require">  </span></label>
                                                    <div class="col-md-5">
                                                        <div class="input text">
														   <?php $i=1; foreach($doc_types as $doc_type){                                                           	
																 echo $i.".&nbsp;&nbsp;".$doc_type['name']."</br>";    
										                       $i++; }  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </fieldset>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->End();?>
</div>