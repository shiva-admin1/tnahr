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
                                <div class="caption"><?php echo($adminUsers->name) ?></div>
                            </div>

                            <div class="panel-body pan">
                                <div class="form-body pal">

                                    <fieldset
                                        style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                        <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record View
                                            </b></legend>

                                        <div class="col-sm-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Role</label>
                                                    <div class="col-md-6">
                                                        <div class="text">
                                                            <?php echo ($adminUsers->role->name) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Username</label>
                                                    <div class="col-md-6">
                                                        <div class="text">
                                                            <?php echo($adminUsers->username) ?>
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
                                                            <?php echo($adminUsers->name) ?>
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
                                                            <?php echo($adminUsers->mobile_no) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <?php if($adminUsers->role_id == 5 || $adminUsers->role_id == 9){  ?>
                                            <div class="col-md-12 section_ass">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Department Sections
                                                    <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $adminUsers['department_section']['name'];?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Email</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo($adminUsers->email) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Address</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo($adminUsers->address) ?>
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
                                                            <?php echo($adminUsers->district->name) ?>
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
                                                            <?php echo($adminUsers->taluk->name) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <?php if($adminUsers->role_id == 5 || $adminUsers->role_id == 9){  ?>
                                            <div class="col-md-12 section_ass">
												 <div class="form-group">
													<label for="inputContent" class="col-md-4 control-label bold">Document Types
													<span class="require"></span></label>
													<div class="col-md-6 dept">
													    <?php $i=1; foreach($doc_types as $doc_type){                                                           	
															 echo $i.".&nbsp;&nbsp;".$doc_type['name']."</br>";    
															$i++; }  ?>													  
													</div>											
												</div>
											</div>
											<?php } ?>
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