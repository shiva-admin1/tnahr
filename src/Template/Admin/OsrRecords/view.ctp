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
                    <div class="col-lg-11">
                        <div class="panel portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption">View OSR Records</div>
                            </div>
                            <div class="panel-body pan">
                                <div class="form-body pal">
                                    <?php echo $this->request->data['district']; ?>
                                    <fieldset
                                        style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                        <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Records
                                                Details </b></legend>

                                        <div class="col-sm-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">From
                                                        Survey No </label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords->from_survey_no);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">To
                                                        Survey No </label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords->to_survey_no);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">Page
                                                        No </label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords->page_no);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Keywords / Tags</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords->keyword_tag);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">District Name</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords->district_name);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">Taluk
                                                        Name</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords->taluk_name);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Village Name </label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords->village_name);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Village No </label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords->village_no);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset
                                        style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                        <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Image
                                            </b></legend>
											<div class="col-sm-12"><br>
	<button onclick="printDiv();" class="btn btn-success">Print Page</button>
	</div>
                                        <div class="col-md-12"  id="recordImage" style="background-size:cover" >
                                            <div class="form-group">
                                                &nbsp;&nbsp;&nbsp;<iframe id="current_image"
                                                    rel=<?php echo $osrFiles[1]; ?> allowFullScreen="true"
                                                    frameborder="0" height="410px" width="950px"
                                                    src="<?php echo $this->Url->build('/', true);?><?php echo $osrRecords->file_path; ?>"
                                                    title="View Record" style="border:none;"></iframe>
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
<style>
.disp {
    display: none;
}
</style>

<script>
    function printDiv() {
	
	   var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write(document.getElementById("recordImage").outerHTML);
    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
     
}
</script>