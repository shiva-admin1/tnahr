<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>


<style>
.bold{
	font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
<form class = 'form-horizontal col s12 m12'>
<div class="col-lg-12">
    	<div id="tab-form-actions" class="tab-pane fade active in">
      		<div class="row">
        		<div class="col-lg-12">
          			<div class="panel portlet box portlet-red">
                        <div class="portlet-header">
							<div class="caption"><?= h($user->name) ?></div>
						</div>
            		
						<div class="panel-body pan">
							<div class="form-body pal">
								
								<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record View </b></legend>

									<div class="col-sm-6">
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Role</label>
											<div class="col-md-6">
												<div class="text">
                                                <?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Username</label>
											<div class="col-md-6">
												<div class="text">
                                                <?= h($user->username) ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Name</label>
											<div class="col-md-6">
												<div class="input text">
                                                <?= h($user->name) ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Mobile Number</label>
											<div class="col-md-6">
												<div class="input text">
                                                <?= h($user->mobile_no) ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Email</label>
											<div class="col-md-6">
												<div class="input text">
                                                <?= h($user->email) ?>
												</div>
											</div>
										</div>
									</div>
									</div>
									<div class="col-sm-6">
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">ID</label>
											<div class="col-md-6">
												<div class="input text">
                                                <?= h($user->id) ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">District </label>
											<div class="col-md-6">
												<div class="input text">
												<?= h($user->district->name) ?>
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Taluk </label>
											<div class="col-md-6">
												<div class="input text">
												<?= h($user->taluk->name) ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Mobile Verified</label>
											<div class="col-md-6">
												<div class="input text">
                                                <?= h($user->mobile_verified  ? __('Yes') : __('No')); ?>
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
<style>.disp{display:none;}</style>

