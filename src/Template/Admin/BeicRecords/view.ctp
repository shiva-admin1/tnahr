<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($beicRecord,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Pre 1857 records(1670 to 1857 A.D) (<?php echo($beicRecord->volume_no) ?>)</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;">
                                        <b><?php echo($beicRecord->volume_no) ?>
                                        </b>
                                    </legend>

                                    <div class="col-sm-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Record
                                                    Type </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($beicRecord->document_subtype->name) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Department
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($beicRecord->department) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">General No
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($beicRecord->general_no) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Volume
                                                    No </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($beicRecord->volume_no) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">From
                                                    Date
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">

                                                        <?php echo date('d-m-Y',strtotime($beicRecord->fromdate)) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">To
                                                    Date
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo date('d-m-Y',strtotime($beicRecord->todate)) ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Keywords/
                                                    Tags
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($beicRecord->keyword_tag) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Enclosure
                                                    </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php if($beicRecord->file_path){ ?>
                                                        <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $beicRecord->file_path; ?>"
                                                            style="color:#1ECBE4;"><i
                                                                class="fas fa-file-pdf"></i>&nbsp;View
                                                            Document</a>
                                                        <?php }?>
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
                            src="<?php echo $this->Url->build('/', true)?><?php echo $beicRecord['file_path']; ?>"
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