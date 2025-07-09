<style>
.bold {
    font-weight: bold;
}
</style>

<div class="row" oncontextmenu="return false;">
    <form class='form-horizontal col s12 m12'>
        <div class="col-lg-12">
            <div id="tab-form-actions" class="tab-pane fade active in">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption">Government Order(<?php echo($goRecords->go_no); ?>)</div>
                            </div>

                            <div class="panel-body pan">
                                <div class="form-body pal">

                                    <fieldset
                                        style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                        <legend style="font-size:18px;margin-left:10px;color:#00355F;">
                                            <b><?php echo($goRecords->go_no); ?> </b>
                                        </legend>

                                        <div class="col-sm-4">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-5 control-label bold">Record
                                                        Type</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($goRecords->document_subtype->name); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-5 control-label bold">GO
                                                        Number</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($goRecords->go_no); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">GO Subject</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($goRecords->abstract_subject); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Department</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($goRecords->go_department->name); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-5 control-label bold">GO
                                                        Date</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo date('d-m-Y',strtotime($goRecords->go_date)); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Keywords / Tags</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($goRecords->keyword_tag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Abstract Copy</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $goRecords->abstract_file_path; ?>"
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View Abstract</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-5 control-label bold">GO
                                                        Full Copy</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $goRecords->fulldoc_file_path; ?>"
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Full GO</a>
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
                                src="<?php echo $this->Url->build('/', true)?><?php echo $goRecords['fulldoc_file_path']; ?>"
                                title="View T&C" style="border:none;"></iframe>
                        </center>
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