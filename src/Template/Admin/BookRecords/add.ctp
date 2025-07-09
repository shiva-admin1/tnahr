<style>
.bold {
    font-weight: bold;
}
</style>

<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($bookRecord,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Add Book</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Book
                                        </b></legend>

                                    <div class="col-sm-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Record
                                                    Type <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>false,'error'=>false,'required'=>'false','empty'=>'Select Record Type',onchange=>'loadauthor(this.value)']);?>
                                                    </div>
                                                   <?php if (isset($errors['document_subtype_id'])): ?>
                                                        <div class="error-message"><?php echo $errors['document_subtype_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Title<span
                                                        class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('title',['class'=>'form-control','label'=>false,'error'=>false,'maxlength'=>'250','required'=>'false','minlength'=>'1','placeholder'=>'Title']);?>
                                                    </div>
                                                     <?php if (isset($errors['title'])): ?>
                                                        <div class="error-message"><?php echo $errors['title']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($author == ''){ echo "<style>.author{display:none;}</style>"; ?>
                                        <div class="col-md-12 author">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Author
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('author',['class'=>'form-control','label'=>false,'error'=>false,'maxlength'=>'250','required'=>'false','minlength'=>'1','placeholder'=>'Author']);?>
                                                    </div>
                                                     <?php if (isset($errors['author'])): ?>
                                                        <div class="error-message"><?php echo $errors['author']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Subject
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('subject',['class'=>'form-control name','label'=>false,'error'=>false,'minlength'=>'1','required'=>'false','maxlength'=>'250','placeholder'=>'Subject']);?>

                                                    </div>
                                                     <?php if (isset($errors['subject'])): ?>
                                                        <div class="error-message"><?php echo $errors['subject']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Year of
                                                    Publication
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('publication_year',['class'=>'form-control num','label'=>false,'error'=>false,'minlength'=>'1','required'=>'false','required'=>'false','placeholder'=>'Year of Publication','onblur'=>'callYop(this);']);?>

                                                    </div>
                                                     <?php if (isset($errors['publication_year'])): ?>
                                                        <div class="error-message"><?php echo $errors['publication_year']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Accession
                                                    No
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('accession_no',['class'=>'form-control','label'=>false,'error'=>false,'type'=>'text','required'=>'false','placeholder'=>'Accession Number']);?>
                                                    </div>
                                                     <?php if (isset($errors['accession_no'])): ?>
                                                        <div class="error-message"><?php echo $errors['accession_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Catalogue
                                                    No
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('catalogue_no',['class'=>'form-control','label'=>false,'error'=>false,'type'=>'text','required'=>'false','placeholder'=>'Catalogue Number']);?>
                                                    </div>
                                                     <?php if (isset($errors['catalogue_no'])): ?>
                                                        <div class="error-message"><?php echo $errors['catalogue_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($publisher == ''){ echo "<style>.publisher{display:none;}</style>"; ?>
                                        <div class="col-md-12 publisher">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Publisher
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('publisher_name',['class'=>'form-control','label'=>false,'error'=>false,'type'=>'text','required'=>'false','placeholder'=>'Publisher']);?>
                                                    </div>
                                                     <?php if (isset($errors['publisher_name'])): ?>
                                                        <div class="error-message"><?php echo $errors['publisher_name']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Keywords /
                                                    Tags
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keyword_tag',['class'=>'form-control alphanumericandcomma','label'=>false,'error'=>false,'required'=>'false','rows'=>'2','minlength'=>'1','placeholder'=>'Keyword/Tag']);?>
                                                    </div>
                                                     <?php if (isset($errors['keyword_tag'])): ?>
                                                        <div class="error-message"><?php echo $errors['keyword_tag']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Upload
                                                    Book Enclosure<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('file_path',['class'=>'form-control document_path resumeUpload','type'=>'file','label'=>false,'error'=>false,'required'=>'false']);?>
                                                        <small class="danger" style="color: tomato;"> Only PDF File
                                                            allowed.
                                                        </small>
                                                         <?php if (isset($errors['file_path']['_empty'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['_empty']; ?></div>
                                                        <?php endif; ?>
                                                         <?php if (isset($errors['file_path']['custom'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['custom']; ?></div>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-actions text-right none-bg">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-secondary">Save</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="javascript:history.back()">Cancel</button>
                                        <button type="button" class="btn btn-warning" id="res"
                                            onclick="javascript:location.reload();">Reset</button>
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
<style>
.disp {
    display: none;
}
</style>
<script>

function callYop(yop){

var yopval = $(yop).val();
		if( (parseInt(yopval)) <= 1600  || (parseInt(yopval) > 2020 )){
			$(yop).val('');
			alert('Invalid Value');
		}
		
}

$(function() {
    $("#FormID").validate({
        rules: {
            'document_subtype_id': {
                required: true
            },

            'title': {
                required: true
            },
            'author': {
                required: true
            },

            'subject': {
                required: true
            },
            'publication_year': {
                required: true
            },
            'publisher_name': {
                required: true
            },
            'accession_no': {
                required: true
            },
            'catalogue_no': {
                required: true
            },

            'keyword_tag': {
                required: true,
                minlength: 1,
                maxlength: 250
            },
            'document_path[]': {
                required: true
            }
        },

        messages: {
            'document_subtype_id': {
                required: "Select Record Type"
            },

            'title': {
                required: "Enter Title"
            },
            'author': {
                required: "Enter Author"
            },
            'subject': {
                required: "Enter Subject"
            },
            'publication_year': {
                required: "Enter Publication Year"
            },
            'publisher_name': {
                required: "Enter Publisher Name"
            },
            'accession_no': {
                required: "Enter Accession No"
            },
            'catalogue_no': {
                required: "Enter Catalogue No"
            },
            'keyword_tag': {
                required: "Enter  Keywords/ Tags",
                minlength: 'Add More Keywords',
                maxlength: 'Maximum 250 character Length'
            },
            'document_path[]': {
                required: "Upload Book Record Document"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});

function loadauthor(doc_subtype) {
    $('#publisher-name').val('');
    // alert(doc_subtype);
    var doc_subtype;
    if (doc_subtype == '44') {
        $('.author').show();
        $('.publisher').show();
        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true)?>admin/book_records/ajaxgetauthors/" + doc_subtype,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(data, textStatus) {
                //alert(data);
                $('#author').html(data);
            }

        });
    } else if (doc_subtype != '44') {

        $('.author').hide();
        $('#author').val('');

        $('.publisher').hide();
        $('#publisher-name').val('');
    }

}



function validdocs(oInput) {   
	var _validFileExtensions = [ ".pdf"];    
	if (oInput.type == "file") {
		var sFileName = oInput.value;
		if (sFileName.length > 0) {
			var blnValid = false;
			for (var j = 0; j < _validFileExtensions.length; j++) {
				var sCurExtension = _validFileExtensions[j];
				if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
					blnValid = true;
					break;
				}
			}
			if (!blnValid) {
			   alert( _validFileExtensions.join(", ")+ " File Formats only Allowed");
			   //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
			   oInput.value = "";
			   return false;
			}
		}
		var file_size = oInput.files[0].size;
		if(file_size>=1073741824) {
			alert("File Maximum size is 1GB");
			oInput.value = "";
			return false;
		}

	}
    return true;
}


</script>