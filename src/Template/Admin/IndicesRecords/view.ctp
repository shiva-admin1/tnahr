<style>
.bold {
    font-weight: bold;
}

.text-danger {
    color: #e8143b8f;
    font-size: 50%;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($IndiceRecord,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Indices Record</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                 
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">District
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($IndiceRecord->department->name) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Taluk
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($IndiceRecord->indiceyear) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <center>
                        <iframe allowFullScreen="true" frameborder="1" height="445px" width="100%"
                            src="<?php echo $this->Url->build('/', true)?><?php echo $IndiceRecord['file_path']; ?>"
                            title="View T&C" style="border:none;"></iframe>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->End();?>
</div>
<style>
.disp {
    display: none;
}
</style>