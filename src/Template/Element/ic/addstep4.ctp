<style>
.container{
max-width: 1340px;
}
</style>
<div class="nested-top-padding">
	<section id="slick">
		<div class="contact-form">
			<?php echo $this->Form->create($incentiveDetail,['id'=>'project_detail', "autocomplete"=>"off"]) ?>
				<div class="w-100">
					<div class="container">
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
								<div class="col-sm-4">
								<p class="ratings mr-5">12. Project Implemented with *</p>
									<div class="field">
										<?php echo $this->Form->control('project_implementation_type',['label'=>false,'error' => false,'required'=>'true','autocomplete'=>'off','empty'=>"Select Project Implemented with",'options'=>$projectImplemented]); ?>
										<span class="entypo-book icon"></span>
										</span>
									</div>
								</div>
							
								<div class="col-sm-4">
								<p class="ratings mr-5">13. Investment in eligible Fixed assets <br>(during the investment period as per G.O)*</p>
								<div class="field">
							   
									
									<?php echo $this->Form->control('investment_on_fixed_asset_period',['label'=>false,'type'=>'text','error' => false, 'required'=>'true','autocomplete'=>'off','placeholder'=>"Investment in eligible Fixed assets",'value'=>$incentiveDetail['investment_on_fixed_asset_period']]); ?>
									
									<span class="entypo-book icon"></span>
								</div>
								</div>
						</div>	
						<div class="row">
							<div class="col-sm-8">
								<p class="ratings mr-5">14. Details of the investment made on the assets of the unit <span style="color:red;"> (Rs in Lakhs) </span></p>
								<div class="field">
									<table class="table table-responsive" >
										<thead class="row-table">
											<tr>
												<th style="text-align:center;" >S.No.</th>
												<th style="text-align:center;" >Description</th>
												<th style="text-align:center;" >Own Funded</th>
												<th style="text-align:center;" >Funded by Bank / FI</th>
												<th style="text-align:center;" >Amount Invested</th>
												
											</tr>
										</thead>
										<tbody>
											<?php if ($assets){ $i=0;
													foreach($assets as $key => $asset){ ?>
											<tr>
												<td class="trcount"><?php echo $i+1; ?></td>
												<td>
													<?php echo $this->Form->control('asset_name['.$key.']',['label'=>false,'error' => false,'required'=>'true','type'=>'hidden','class'=>'no-icon specialfield trimspace','maxlength'=>'50','value'=>$asset]); ?> 
													<?php echo($asset); ?>
												</td>
												<td>
													<?php echo $this->Form->control('own_fund['.$key.']',['label'=>false,'error' => false,'required'=>'true','type'=>'text','class'=>' no-icon amount trimspace','maxlength'=>'10',"onchange"=>"calcTotalInvestment(".$key.");",'value'=>$incentiveAssetInvestments[$asset]['total_own_fund_amount'],'style'=>'text-align: right;padding-right:25px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('funded_by['.$key.']',['label'=>false,'error' => false,'required'=>'true','type'=>'text','class'=>'fifund no-icon amount trimspace','maxlength'=>'10',"onchange"=>"calcTotalInvestment(".$key.");",'value'=>$incentiveAssetInvestments[$asset]['total_bank_fi_fund_amount'],'style'=>'text-align: right;padding-right:25px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('amount_invested['.$key.']',['label'=>false,'error' => false,'required'=>'true','type'=>'text','readonly'=>'readonly','class'=>'no-icon amount trimspace','maxlength'=>'10','value'=>$incentiveAssetInvestments[$asset]['total_investment_amount'],'style'=>'text-align: right;padding-right:25px']); ?>
												</td>
												
											</tr>
												<?php  $i++; } ?>
											<?php  } ?>
										</tbody>
									</table>
								</div>						
							</div>
							<div class="col-sm-4">
								<p class="ratings mr-2">15 a. Date of Commencement of Commercial Production*</p> 
								<div class="field">
									<?php echo $this->Form->control('commencement_of_commericial_production_date', ['label'=>false,'class'=>'grayed','class'=>'datepicker trimspace','type'=>'text','value'=>$this->Time->format($incentiveDetail['commencement_of_commericial_production_date'],'d-M-Y'),'readonly'=>'readonly']); ?>
									<span class="entypo-book icon"></span>
									<span class="slick-tip left">Date of Commencement*</span>
								</div>	
								<p class="ratings mr-2">15 b. Date of First Sale Invoice *</p> 
								<div class="field">
									<?php echo $this->Form->control('date_of_first_sale_invoice', ['label'=>false,'class'=>'grayed','class'=>'datepicker trimspace','type'=>'text','value'=>$this->Time->format($incentiveDetail['date_of_first_sale_invoice'],'d-M-Y'),'readonly'=>'readonly']); ?>
									<span class="entypo-book icon"></span>
								</div>
								<?php if($incentiveDetail->company_unit_type_id != 1 ){?>
								<p class="ratings mr-3">15 c. Previous Date of Commercial Production*</p> 
								<div class="field">
									<?php echo $this->Form->control('previous_commencement_of_commericial_production_date', ['label'=>false,'class'=>'datepicker','required'=>'true','type'=>'text','value'=>$this->Time->format($incentiveDetail['previous_commencement_of_commericial_production_date'],'d-M-Y')]); ?>
									<span class="entypo-book icon"></span>
									</span>
								</div>									
								<?php } ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<p class="ratings mr-3">
									16. Details of First Invoice for this project *
								</p> 
								<div class="field">
									<?php echo $this->Form->control('details_of_first_invoice', ['label'=>false,'class'=>'specialfield trimspace','row'=>2]); ?>
										<span class="slick-tip left">Details of First Invoice*</span>
								</div>
							</div>
							<div class="col-sm-6">
								<p class="ratings mr-3">
									17. Details of subsidy application registered if
									any, for this project with  other institutions / agency
									of the Central / State Government / any other agencies *
								</p> 
								<div class="field">
									<?php echo $this->Form->control('details_of_subsity_from_other_agencies', ['label'=>false,'class'=>'grayed','required'=>'true','row'=>2]); ?>
								</div>
							</div>
						</div>
						<div class="financial_assistance"   <?php if($incentiveDetail['project_implementation_type'] == 'Own Fund'){ ?> style="display:none;" <?php } ?> />
						<div class="row">
							<div class="col-sm-12">
								<p class="ratings mr-5">18 a. Details of Financial Assistance with Bank / Financial Institution<span style="color:red;"> (Rs in Lakhs) </span></p>
								<div class="field">
									<table class="table table-responsive" id="bankerTable">
										<thead class="row-table">
											<tr>
												<th style="text-align:center;" rowspan =2>S.No.</th>
												<th style="text-align:center;" rowspan =2>Name of the Bank / FI</th>
												<th style="text-align:center;" rowspan =2>Date of Sanctioned</th>
												<th style="text-align:center;" rowspan =2>Amount Sanctioned</th>
												<th style="text-align:center;" rowspan =2>Amount Disbursed</th>
												<th style="text-align:center;" colspan =2>Amount Outstanding</th>
												<th style="text-align:center;" colspan =2>Amount Overdue, if any</th>
												
												<th rowspan =2><button type="button" class="btn btn-success btn-sm" onclick="addMoreBank(this);">Add</button></th>
											</tr>
											<tr>
												<th style="text-align:center;">Principal</th>
												<th style="text-align:center;">Interest</th>														
												<th style="text-align:center;">Principal</th>
												<th style="text-align:center;">Interest</th>
											</tr>
										</thead>
										<tbody>
											<?php if ($incentiveFinancialAssistances){ $i=0;
											foreach($incentiveFinancialAssistances as $key => $value){ ?>
										
											<tr>
												<td class="trcount"><?php echo $i+1; ?></td>
												<td>
													<?php echo $this->Form->control('name_of_bank_fi[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon specialfield fifundass trimspace','maxlength'=>'50','autocomplete'=>'off','value'=>$value['name_of_bank_fi']]); ?>
													
												</td>
												<td>
													<?php echo $this->Form->control('date_of_sanction[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon datepicker fifundass trimspace mb-2','value'=>$this->Time->format($value['date_of_sanction'],'d-M-Y'),'readonly'=>'readonly']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('amount_sanctioned[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','value'=>$value['amount_sanctioned'],'style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('amount_disbursed[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','value'=>$value['amount_disbursed'],'style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('outstanding_principle[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon fifundass amount trimspace','maxlength'=>'10','value'=>$value['outstanding_principle'],'style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('outstanding_interest[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','value'=>$value['outstanding_interest'],'style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('overdue_principle[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','value'=>$value['overdue_principle'],'style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('overdue_interest[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','value'=>$value['overdue_interest'],'style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
												<button <?php echo ($i < 1 )?'style="display:none;"':''; ?> type="button" class="btn btn-danger btn-sm" id="sharholder_delete" rel="<?php echo $value['id']; ?>"  onclick="$(this).closest('tr').remove();">Delete</button>
												</td>
											</tr>
											<?php  $i++; } } else{?>
											<tr>
												<td class="trcount">1</td>
												<td>
													<?php echo $this->Form->control('name_of_bank_fi[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon specialfield fifundass trimspace','maxlength'=>'50','autocomplete'=>'off','value'=>$value['name_of_bank_fi']]); ?>
													
												</td>
												<td>
													<?php echo $this->Form->control('date_of_sanction[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon datepicker fifundass trimspace mb-2','readonly'=>'readonly']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('amount_sanctioned[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('amount_disbursed[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('outstanding_principle[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('outstanding_interest[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('overdue_principle[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<?php echo $this->Form->control('overdue_interest[]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon amount fifundass trimspace','maxlength'=>'10','style'=>'text-align: right;padding-right:5px']); ?>
												</td>
												<td>
													<button style="display:none;" type="button" class="btn btn-danger btn-sm" id="banker_delete" rel="0" onclick="$(this).closest('tr').remove();">Delete</button>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>						
							</div>
						</div>								
						</div>								

						
						<!-- >
							           Soft Loan / Investment Promotion Subsidy th
								<-->
						<div class="soft_and_investment"   <?php if(!array_intersect($incentiveApplicationTypes,array(3,4))){ ?> style="display:none;" <?php } ?> />
						
							<div class="row">
							<div class="col-sm-12">
								<p class="ratings mr-5">  18 b. Details of Last Three Years Prodution & Sale </p>
								<div class="field">
									<table class="table  table-responsive" id="prodSaleTable">
										<thead class="row-table">
											<tr>
												<th style="text-align:center;"  width="5%">S.No.</th>
												<th style="text-align:center;" width="30%">Sale Period *</th>
												<th style="text-align:center;" width="20%">Financial Year *</th>
												<th style="text-align:center;" width="45%">Details of Prodution & Sale *</th>												
											</tr>
										</thead>
										<tbody>
											<?php if ($productionSales){ $i=0;
											foreach($productionSales as $key => $value){ ?>
											<tr>
												<td class="trcount"><?php echo $key+1; ?></td>
												<td>
													<?php echo $this->Form->control('product_id[]',['label'=>false,'error' => false,'required'=>'false','type'=>'hidden','value'=>$value['id']]); ?>
													<?php echo $this->Form->control('sale_period['.$value["id"].']',['label'=>false,'error' => false,'class'=>'specialfield no-icon trimspace','minlength'=>'2','maxlength'=>'70','required'=>'false','value'=>$value['sale_period']]); ?>
												
												</td>
												<td>
												<?php echo $this->Form->control('sale_financial_year['.$value["id"].']',['label'=>false,'error' => false,'class'=>'trimspace','options'=>$financialYears,'required'=>'false','value'=>$value['financial_year']]); ?>
												
												</td>
												<td>
													<?php echo $this->Form->control('details_of_prodution_sale['.$value["id"].']',['label'=>false,'error' => false,'class'=>'specialfield  no-icon trimspace','minlength'=>'2','maxlength'=>'70','required'=>'false','value'=>$value['details_of_prodution_sale']]); ?>
												
												</td>
											</tr>
												<?php  $i++; } } else{ $j =1;  
												while($j <= 3) {  ?>
											<tr>
												<td class="trcount"><?php echo $i; ?></td>
												<td>
													<?php echo $this->Form->control('sale_period['.$j.']',['label'=>false,'error' => false,'class'=>'specialfield trimspace','minlength'=>'2','maxlength'=>'70','required'=>'false']); ?>
												
												</td>
												<td>
													<?php echo $this->Form->control('sale_financial_year['.$j.']',['label'=>false,'error' => false,'class'=>'trimspace','options'=>$financialYears,'required'=>'false']); ?>
												
												</td>
												<td>
													<?php echo $this->Form->control('details_of_prodution_sale['.$j.']',['label'=>false,'error' => false,'class'=>'specialfield  no-icon trimspace','minlength'=>'2','maxlength'=>'70','required'=>'false']); ?>
												
												</td>
											</tr>
											<?php $j++; }    } ?>
										</tbody>
									</table>
								</div>									
							</div>
							</div>
							<div class="row">
							<div class="col-sm-12">
								<p class="ratings mr-5"> 18 c. Details of Last Three Years  VAT & CST remitted </p>
								<div class="field">
									<table class="table  table-responsive" id="VATTable">
										<thead class="row-table">
											<tr>
												<th style="text-align:center;" width="5%">S.No.</th>
												<th style="text-align:center;" width="30%">Tax Period *</th>
												<th style="text-align:center;" width="20%">Financial Year *</th>
												<th style="text-align:center;" width="45%">Details of VAT & CST remitted *</th>
												
											</tr>
										</thead>
										<tbody>
											<?php if ($taxDetails){ $i=0;
											foreach($taxDetails as $key => $value){ ?>
											<tr>
												<td class="trcount"><?php echo $key+1; ?></td>
												<td>
													<?php echo $this->Form->control('tax_id[]',['label'=>false,'error' => false,'required'=>'false','type'=>'hidden','value'=>$value['id']]); ?>
													<?php echo $this->Form->control('tax_period[]',['label'=>false,'error' => false,'required'=>'false','class'=>'specialfield no-icon  trimspace','minlength'=>'2','maxlength'=>'70','value'=>$value['tax_period']]); ?>
												</td>
												<td>
													<?php echo $this->Form->control('tax_financial_year[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon  trimspace ','options'=>$financialYears,'value'=>$value['financial_year']]); ?>
												</td>
												<td>
													<?php echo $this->Form->control('details_of_tax[]',['label'=>false,'error' => false,'required'=>'false','class'=>'specialfield no-icon  trimspace','maxlength'=>'10','value'=>$value['details_of_tax'],'style'=>'text-align: left;padding-right:50px']); ?>
												</td>
											</tr>
												<?php  $i++; } } else{ $j =1;  
												while($j <= 3) { ?>
											<tr>
												<td class="trcount"><?php echo $i; ?></td>
												<td>
													<?php echo $this->Form->control('tax_period['.$j.']',['label'=>false,'error' => false,'class'=>'specialfield trimspace','minlength'=>'2','maxlength'=>'70','required'=>'false']); ?>
												
												</td>
												<td>
													<?php echo $this->Form->control('tax_financial_year['.$j.']',['label'=>false,'error' => false,'class'=>'trimspace','options'=>$financialYears,'required'=>'false']); ?>
												
												</td>
												<td>
													<?php echo $this->Form->control('details_of_tax['.$j.']',['label'=>false,'error' => false,'class'=>'specialfield trimspace','minlength'=>'2','maxlength'=>'70','required'=>'false']); ?>
												
												</td>
											</tr>
											<?php $j++; }    } ?>
										</tbody>
									</table>
								</div>									
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
