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
    <?php echo $this->Form->create($ifrRecord,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">IFR Record (<?php echo($ifrRecord->village_no) ?>)</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;">
                                        <b><?php echo($ifrRecord->village_no) ?>
                                        </b>
                                    </legend>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">District
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($ifrRecord->district_name) ?>
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
                                                        <?php echo($ifrRecord->taluk_name) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Village
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($ifrRecord->village_name) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Village
                                                    No
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($ifrRecord->village_no) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Title Deed
                                                    (TD) No
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($ifrRecord->title_deed_no) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Sheet
                                                    No
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($ifrRecord->sheet_no) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Keywords/
                                                    Tags</label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($ifrRecord->keyword_tag) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">IFR
                                                    Enclosure </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $ifrRecord->file_path; ?>"
                                                            style="color:#1ECBE4;"><i
                                                                class="fas fa-file-pdf"></i>&nbsp;View Enclosure</a>
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
                            src="<?php echo $this->Url->build('/', true)?><?php echo $ifrRecord['file_path']; ?>"
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