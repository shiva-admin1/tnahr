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
                                <div class="caption">Gazette(<?php echo($gazettes->notification_no); ?>)</div>
                            </div>

                            <div class="panel-body pan">
                                <div class="form-body pal">

                                    <fieldset
                                        style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                        <legend style="font-size:18px;margin-left:10px;color:#00355F;">
                                            <b><?php echo($gazettes->notification_no); ?> </b>
                                        </legend>


                                        <div class="col-sm-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Record Type</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($gazettes->document_subtype->name); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Notification No</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($gazettes->notification_no); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Notification Date</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo date('d-m-Y',strtotime($gazettes->notification_date)); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Part</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($gazettes->gpart); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Section</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($gazettes->gsection); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Abstract /
                                                        Subject</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($gazettes->abstract_subject); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Keywords / Tags</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($gazettes->keyword_tag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Gazette Enclosure</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $gazettes->file_path; ?>"
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Enclosure</a>
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
                                src="<?php echo $this->Url->build('/', true)?><?php echo $gazettes['file_path']; ?>"
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