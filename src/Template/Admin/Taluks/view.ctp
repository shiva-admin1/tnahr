<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($taluk,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-10">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption"><?php echo $taluk['name'];?></div>
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
                                                        class="col-md-4 control-label bold">District <span
                                                            class="require"></span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $taluk['district']['name'];?>
                                                        </div>
                                                    </div>
                                                </div>
												    <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Taluk Name<span
                                                            class="require"></span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $taluk['name'];?>
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
