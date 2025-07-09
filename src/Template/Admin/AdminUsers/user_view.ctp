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
                                <div class="caption"><?php echo($users->name) ?></div>
                            </div>
                            <div class="panel-body pan">
                                <div class="form-body pal">
                                    <fieldset    style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                        <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record View
                                            </b></legend>
                                        <div class="col-sm-6">                                           
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Username</label>
                                                    <div class="col-md-6">
                                                        <div class="text">
                                                            <?php echo($users->username) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Name</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo($users->name) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">Mobile
                                                        Number</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo($users->mobile_no) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
											  <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Email</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo($users->email) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">                                          
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Address</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo($users->address) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">District </label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo($users->district->name) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">Taluk
                                                    </label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo($users->taluk->name) ?>
                                                        </div>
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