<style>
.bold{
	font-weight: bold;
}
#default{
  text-align:center;
}
.img-magnifier-container {
  position:relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 15px;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 550px;
  height: 280px;
}
</style>
<script type="text/javascript">
	function magnify(imgID, zoom) {
	  var img, glass, w, h, bw;
	  img = document.getElementById(imgID);
	  /*create magnifier glass:*/
	  glass = document.createElement("DIV");
	  glass.setAttribute("class", "img-magnifier-glass");
	  /*insert magnifier glass:*/
	  img.parentElement.insertBefore(glass, img);
	  /*set background properties for the magnifier glass:*/
	  glass.style.backgroundImage = "url('" + img.src + "')";
	  glass.style.backgroundRepeat = "no-repeat";
	  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
	  bw = 6;
	  w = glass.offsetWidth / 10;
	  h = glass.offsetHeight / 10;
	  /*execute a function when someone moves the magnifier glass over the image:*/
	  glass.addEventListener("mousemove", moveMagnifier);
	  img.addEventListener("mousemove", moveMagnifier);
	  /*and also for touch screens:*/
	  glass.addEventListener("touchmove", moveMagnifier);
	  img.addEventListener("touchmove", moveMagnifier);
	  function moveMagnifier(e) {
	    var pos, x, y;
	    /*prevent any other actions that may occur when moving over the image*/
	    e.preventDefault();
	    /*get the cursor's x and y positions:*/
	    pos = getCursorPos(e);
	    x = pos.x;
	    y = pos.y;
	    /*prevent the magnifier glass from being positioned outside the image:*/
	    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
	    if (x < w / zoom) {x = w / zoom;}
	    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
	    if (y < h / zoom) {y = h / zoom;}
	    /*set the position of the magnifier glass:*/
	    glass.style.left = (x - w) + "px";
	    glass.style.top = (y - h) + "px";
	    /*display what the magnifier glass "sees":*/
	    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
	  }
	  function getCursorPos(e) {
	    var a, x = 0, y = 0;
	    e = e || window.event;
	    /*get the x and y positions of the image:*/
	    a = img.getBoundingClientRect();
	    /*calculate the cursor's x and y coordinates, relative to the image:*/
	    x = e.pageX - a.left;
	    y = e.pageY - a.top;
	    /*consider any page scrolling:*/
	    x = x - window.pageXOffset;
	    y = y - window.pageYOffset;
	    return {x : x, y : y};
	  }
	}
</script>


<div class="row" oncontextmenu="return false;">
<div class="col-lg-12">
<?php echo $this->Form->create($fmbRecords,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    	<div id="tab-form-actions" class="tab-pane fade active in">
      		<div class="row">
        		<div class="col-lg-12">
          			<div class="panel portlet box portlet-red">
                        <div class="portlet-header">
							<div class="caption">Edit FMB Records</div>
						</div>
            			<div class="panel-body pan">
							<div class="form-body pal">
								<div class="col-md-3">
									<fieldset  style="width:100%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Records Details </b></legend>

										
										<div class="col-md-12">
											<div class="form-group">
												<div class="col-md-12">
												<button name="save_only" type="submit" val="1" class="btn btn-secondary">Save & Move Next</button><br><br>
												<button type="button" class="btn btn-danger" onclick="javascript:history.back()">Back</button>
												<button type="reset" class="btn btn-warning">Reset</button>
												
												<a class="btn btn-danger" href="<?php echo $this->Url->build('/', true);?>admin/fmb_records/edit/<?php echo $nextid; ?>">Skip</a>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>'Type','error'=>false,'empty'=>'Select Record Type','value'=>$fmbRecords->document_subtype_id]);?>
                                                    </div>
                                                </div>
                                            </div>
											<div class="cc">
											<div class="form-group">
												<div class="col-md-12">
													<div class="input text">
														<?php echo $this->Form->control('survey_no',['class'=>'form-control num ccvalue ','label'=>'Survey No','error'=>false,'maxlength'=>'250','placeholder'=>'Survey No','value'=>$fmbRecords->survey_no]);?>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-12">
													<div class="input text">
														<?php echo $this->Form->control('page_no',['class'=>'form-control ','label'=>'Page No','error'=>false,'maxlength'=>'250','placeholder'=>'Page No','value'=>$fmbRecords->page_no]);?>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-12">
													<div class="input text">
														<?php echo $this->Form->control('keyword_tag',['class'=>'form-control ','label'=>'Keywords / Tags','error'=>false,'rows'=>'2','placeholder'=>'Enter Tags seperated by comma eg: osr,tiruppur','value'=>$fmbRecords->keyword_tag]);?>
														
													</div>
												</div>
											</div>

										</div>
									</fieldset>
								</div>
								<div class="col-md-9">
									<div class="row">								
									<div class="col-md-3">								
										<div class="form-group">
											<div class="col-md-12">
												<div class="input text">
													<?php echo $this->Form->control('district_name',['class'=>'form-control name','label'=>'District Name','error'=>false,'maxlength'=>'250','placeholder'=>'District Name','value'=>$fmbRecords->district_name]);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-12">
												<div class="input text">
													<?php echo $this->Form->control('taluk_name',['class'=>'form-control name','label'=>'Taluk Name','error'=>false,'maxlength'=>'250','placeholder'=>'Taluk Name','value'=>$fmbRecords->taluk_name]);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-12">
												<div class="input text">
													<?php echo $this->Form->control('village_name',['class'=>'form-control name','label'=>'Village Name','error'=>false,'maxlength'=>'250','placeholder'=>'Village Name','value'=>$fmbRecords->village_name]);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<div class="col-md-12">
												<div class="input text">
													<?php echo $this->Form->control('village_no',['class'=>'form-control num','label'=>'Village No','error'=>false,'maxlength'=>'250','placeholder'=>'Village Name','value'=>$fmbRecords->village_no]);?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									    <!-- default start -->
								<section id="default" class="padding-top0">
								<div class="row">
								 	<div class="col-md-12">
										  	<div class="img-magnifier-container">
											  <img id="myimage" class="img-responsive" src= "<?php echo $this->Url->build('/', true);?><?php echo $fmbRecords->file_path; ?>" xoriginal="<?php echo $this->Url->build('/', true);?><?php echo $fmbRecords->file_path; ?>" />
											</div>
										  </div>
								</div>
								</section>
								</div>
								
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
  	</div>
  	
  	<?php echo $this->Form->End();?> 
</div>
<style>.disp{display:none;}</style>
<script>
/* Initiate Magnify Function
	with the id of the image, and the strength of the magnifier glass:*/
	magnify("myimage", 3);
	/*
$('#document-subtype-id').on('change',function(){

var doctypid = $('#document-subtype-id').val();

		if(doctypid == '42'){ // Survey Data
					
			$('.cc').show();
			$('.ccvalue').val('').attr("required",true);
			
		}else {
			
			$('.cc').hide();
			$('.ccvalue').val('').attr("required",false);
			

		}
		
});
*/

$('body').addClass('sidebar-collapsed');

$(function() {
    $("#FormID").validate({
        rules: {
            'survey_no': {
                required: true,
                minlength: 1,
                maxlength: 10
            },
            'village_name': {
                required: true,
                minlength: 2,
                maxlength: 60
            },

            'district_name': {
                required: true,
                minlength: 2,
                maxlength: 60
            },
            'taluk_name': {
                required: true,
                minlength: 2,
                maxlength: 60
            },

            'keyword_tag': {
                required: true,
                minlength: 2,
                maxlength: 150
            },
            'page_no': {
                required: true,
                minlength: 1,
                maxlength: 9
            }
        },

        messages: {
            'survey_no': {
                required: "Enter Survey NO",
                minlength: 'Enter Valid Survey NO',
                maxlength: 'Enter Valid Survey NO'
            },
			'district_name': {
                required: "Enter District",
                minlength: 'Minimum Character Length is 2',
                maxlength: 'Maximum Character Length is 150'
            },
			'taluk_name': {
                required: "Enter Taluk",
                minlength: 'Minimum Character Length is 2',
                maxlength: 'Maximum Character Length is 150'
            },
			'village_name': {
                required: "Enter Village",
                minlength: 'Minimum Character Length is 2',
                maxlength: 'Maximum Character Length is 150'
            },
            'page_no': {
                required: "Enter Page NO",
                minlength: 'Enter Valid Page NO',
                maxlength: 'Enter Valid Page NO'
            },
            'keyword_tag': {
                required: "Enter  Keywords/ Tags",
                minlength: 'Add More Keywords',
                maxlength: 'Maximum 150 character Length'
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
</script>