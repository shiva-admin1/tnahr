<style type="text/css">
.error {

    color: red;
}
</style>
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

    function printDiv() 
    {

      var divToPrint=document.getElementById('DivIdToPrint');

      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write('<html><style type="text/css">html,body{width:100%!important;}img{width:100%!important;transform: rotate(90deg);}</style><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);

    }
</script>


<div class="row">
    <?php $error = $this->Session->flash(); ?>
    <?php if($error != ''){?>
    <div class="col-lg-12">
        <div class="note note-success"> <?php echo $error;?> </div>
    </div>
    <?php }?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption"><?php echo "Search OSR Records"?></div>

                            </div>
                        </div>
                        <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                 <div class="row">
								
								<div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12"><label for="inputContent">District<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('district',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select District','options'=>$districts,onchange=>'loadtaluk(this.value)']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('taluk',['class'=>'form-control','label'=>'Taluk','error'=>false,'empty'=>'Select Taluk','options'=>($taluks)?$taluks:'',onchange=>'loadvillage(this.value)']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('village',['class'=>'form-control','label'=>'Village','error'=>false,'empty'=>'Select Village','options'=>($villages)?$villages:'']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12"><label for="inputContent">Survey No<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('survey_no',['class'=>'form-control','label'=>false,'error'=>false,'placeholder'=>'Survey No']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								</div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-10">
                                                <button type="submit" class="btn btn-green">Search Record</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->End();?>

                    <?php if($osrRecords){  ?>
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
                                <div class="caption">Result</div>
                            </div>
                            <div class="panel-body pan">
                                <div class="form-body pal">
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
                                                            <?php echo ($osrRecords[0]['from_survey_no']);?>
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
                                                            <?php echo ($osrRecords[0]['to_survey_no']);?>
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
                                                            <?php echo ($osrRecords[0]['page_no']);?>
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
                                                            <?php echo ($osrRecords[0]['keyword_tag']);?>
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
                                                            <?php echo ($osrRecords[0]['district_name']);?>
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
                                                            <?php echo ($osrRecords[0]['taluk_name']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">Village Name </label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords[0]['village_name']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">Village No </label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo ($osrRecords[0]['village_no']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">										
                                            <button type='button' id='btn' class="btn btn-success" onclick='printDiv();'>Print Image <i class="fa fa-print"></i></button><br><br><br><br>
                                        	<div class="img-magnifier-container" id="DivIdToPrint">
											  <img id="myimage" style="width: 100%;" src= "<?php echo $this->Url->build('/', true);?><?php echo $osrRecords[0]['file_path']; ?>" xoriginal="<?php echo $this->Url->build('/', true);?><?php echo $osrRecords[0]['file_path']; ?>" />
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    $("#FormID").validate({

        rules: {
            'district': {
                required: true
            },
			'survey_no': {
                required: true
            }
        },

        messages: {
            'district': {
                required: "Select District"
            },
			'survey_no': {
                required: "Enter Survey No"
            }
        },
        submitHandler: function(form) {

            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});


magnify("myimage", 3);
$('body').addClass('sidebar-collapsed');

function loadtaluk(dist_name) {
    $('#village').val('');
    var dist_name;
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/osr_records/ajaxgettaluks/" + dist_name,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(data, textStatus) {
            $('#taluk').html(data);
        }
    });


}

function loadvillage(taluk_name) {
    var taluk_name;
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/osr_records/ajaxgetvillages/" + taluk_name,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(data, textStatus) {
            $('#village').html(data);
        }
    });


}
</script>