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
                    <div class="col-lg-5">
                        <div class="panel portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption"><?php echo ($departmentSection->name); ?></div>
                            </div>
                            <div class="panel-body pan">
                                <div class="form-body pal">
                                    <fieldset
                                        style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                        <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>                                                
                                            </b></legend>
                                        <div class="col-sm-12">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-5 control-label bold">Department Section</label>
                                                    <div class="col-md-7">
                                                        <div class="text">
                                                            <?php echo($departmentSection->name); ?>
                                                        </div>
                                                    </div>
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