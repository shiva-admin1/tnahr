<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($bookRecord,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Book  (<?php echo($bookRecord->title) ?>)</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;">
                                        <b><?php echo($bookRecord->title) ?>
                                        </b>
                                    </legend>

                                    <div class="col-sm-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Record
                                                    Type </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($bookRecord->document_subtype->name) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-5 control-label bold">Title</label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($bookRecord->title) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 author" <?php if($bookRecord->author == '') { ?>
                                            style="display:none;" <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Author
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($bookRecord->author) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Subject
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($bookRecord->subject) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Year of
                                                    Publication
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($bookRecord->publication_year) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 publisher_name"
                                            <?php if($bookRecord->publisher_name == ''){ ?> style="display:none;"
                                            <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Publisher
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($bookRecord->publisher_name) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Accession
                                                    No
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($bookRecord->accession_no) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Catalogue
                                                    No
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($bookRecord->catalogue_no) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Keywords /
                                                    Tags
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($bookRecord->keyword_tag) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">
                                                    Book Enclosure</label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $bookRecord->file_path; ?>"
                                                            style="color:#1ECBE4;"><i
                                                                class="fas fa-file-pdf"></i>&nbsp;View
                                                            Document</a>
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
                            src="<?php echo $this->Url->build('/', true)?><?php echo $bookRecord['file_path']; ?>"
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