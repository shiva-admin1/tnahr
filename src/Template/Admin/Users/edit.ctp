<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>


<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php $error = $this->Session->flash(); ?>
    <?php if($error != ''){?>
    <div class="col-lg-12">
        <div class="note note-success"> <?php echo $error;?> </div>
    </div>
    <?php }?>
    <form class='form-horizontal col s12 m12' method="post">
        <div class="col-lg-12">
            <div id="tab-form-actions" class="tab-pane fade active in">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="panel portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption">Edit Users</div>
                            </div>

                            <div class="panel-body pan">
                                <div class="form-body pal">

                                    <fieldset
                                        style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                        <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>User Details
                                            </b></legend>

                                        <div class="col-sm-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Role</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('role_id',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value' =>$user->role_id]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Username</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('username',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$user->username]);?>
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
                                                            <?php echo $this->Form->control('name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$user->name]);?>
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
                                                            <?php echo $this->Form->control('mobile_no',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$user->mobile_no]);?>
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
                                                            <?php echo $this->Form->control('email',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$user->email]);?>
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
                                                            <?php echo $this->Form->control('address',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$user->address]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">District</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('district_id',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$user->district_id]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Taluk</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('taluk_id',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$user->taluk_id]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">Mobile
                                                        Verified</label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('mobile_verified',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','value'=>$user->mobile_verified]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="col-lg-12">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-green">Submit</button>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-red"
                                                    onclick="javascript:history.back()">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
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