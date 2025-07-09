<div>
	<section id="slick">
		<!-- Contact form -->
		<div class="contact-form">
			<?php echo $this->Form->create($incentiveDetail,['id'=>'project_cost', "autocomplete"=>"off"]) ?> 
			<div class="w-100">
				<div class="container-fluid">
					
					<div class="row">
								<div class="col-sm-12">							
									<div class="field text-center">
										<span class="blink_me" style="color:red;"> 
										 Details and Values should be given for this project (incentive applying for) only
										<span>										
									</div>
								</div>
							</div>
						
					<div class="row">
						<div class="col-sm-12">
							<div class="alert alert-danger col-sm-12 mb-20"> Instruction : All the fields are mandatory. Kindly enter “0” if a particular field is not applicable</div>
							<div class="card">
								<div class="card-body">
									<div class="ratings text-center row m-3">
										<div class="col-sm-12">
											<h5>INVESTMENTS MADE IN ELIGIBLE FIXED ASSETS FOR THE PROJECT FOR THE PERIOD</h5>
										</div>
										<div class="col-sm-2 offset-sm-4">
											<label>FROM</label> <?php echo $this->Form->control('investment_on_fixed_asset_from_period',['label'=>false,'error' => false,'class'=>'datepicker','required'=>'true','type'=>'text','value'=>$this->Time->format($incentiveDetail['investment_on_fixed_asset_from_period'],'d-M-Y')]); ?>
										</div>
										<div class="col-sm-2">
											<label>TO</label> <?php echo $this->Form->control('investment_on_fixed_asset_to_period',['label'=>false,'error' => false,'class'=>'datepicker','required'=>'true','type'=>'text','value'=>$this->Time->format($incentiveDetail['investment_on_fixed_asset_to_period'],'d-M-Y')]); ?>
										</div>
											
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1">
						</div>
						<div class="col-sm-4">
							<h4 class="ratings mr-5">19. Cost of Project<span style="color:red;">  (in Rs Lakhs unless otherwise specified)<span></h4>
							
						
							<?php foreach($projectCostTypes as $pct => $cost){?>
							<p class="ratings mr-5"><?php echo($cost); ?></p>
							<div class="field">
								<?php echo $this->Form->control('pct_name['.$pct.']',['label'=>false,'error' => false,'required'=>'true','type'=>'text','class'=>'amount trimspace project_cost','maxlength'=>'10','placeholder'=>$cost,"onchange"=>"calc_project_cost();",'style'=>'text-align: right;padding-right:60px','value'=>$incentiveProjectCosts[$pct]]); ?>
								<span class="icon-new">Lakhs</span>
								<span class="slick-tip left"><?php echo($cost); ?></span>
							</div>
							<?php } ?>
							<p class="ratings mr-5">Total Cost of Project</p>
							<div class="field">
								<?php echo $this->Form->control('total_project_cost',['label'=>false,'error' => false,'type'=>'text','class'=>'amount trimspace','maxlength'=>'10','placeholder'=>"Total Cost of Project",'readonly'=>'readonly','style'=>'text-align: right;padding-right:60px','value'=>$incentiveDetail['total_project_cost']]); ?>
								<span class="icon-new">Lakhs</span>
								<span class="slick-tip left"> Total Cost of Project</span>
							</div>
						</div>
								
			  
						<div class="col-sm-4"> 
							<h4 class="ratings mr-5">20. Means of Finance <span style="color:red;">  (in Rs Lakhs unless otherwise specified)<span></h4>
							
							<?php foreach($meansOfFinanceTypes as $mof => $cost){ ?>
								<p class="ratings"><?php echo($cost); ?></p>
								<div class="field">
									<?php echo $this->Form->control('mof_name['.$mof.']',['label'=>false,'error' => false,'required'=>'true','type'=>'text','class'=>'amount trimspace mof_cost','maxlength'=>'10','placeholder'=>$cost,"onchange"=>"calc_mof_cost();",'style'=>'text-align: right;padding-right:60px','value'=>$incentiveMeansOfFinances[$mof]]); ?>
									<span class="icon-new">Lakhs</span>
									<span class="slick-tip left"><?php echo($cost); ?></span>
								</div>								
							
							<?php  }?>
							<p class="ratings mr-5 col-sm-6">Total Means of Finance</p>
							<div class="field">
								<?php echo $this->Form->control('total_mof_cost',['label'=>false,'error' => false,'type'=>'text','class'=>'amount trimspace','maxlength'=>'10','placeholder'=>"Total MOF",'readonly'=>'readonly','style'=>'text-align: right;padding-right:60px','value'=>$incentiveDetail['total_mof_cost']]); ?>
								<span class="icon-new">Lakhs</span>
								<span class="slick-tip left">Total</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="submit" name="next" class="send" value="Save & Continue" />
			<?php echo $this->Form->end() ?>
		</div>
	</section>
</div>	

 