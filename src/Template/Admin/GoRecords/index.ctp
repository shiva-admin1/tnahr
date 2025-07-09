<style type="text/css">
    .error {

        color: red;
    }
</style>
<div class="row">
    <?php $error = $this->Session->flash(); ?>
    <?php if ($error != '') { ?>
        <div class="col-lg-12">
            <div class="note note-success"> <?php echo $error; ?> </div>
        </div>
    <?php } ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption"><?php echo "GO Records" ?></div>
                               <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add GO Record', array('action' => 'add'), array('escape' => false, 'class' => 'btn btn-outline-secondary', 'target' => '_blank')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8"><label for="inputContent">Document  Type<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('document_subtype_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select Document Type', 'options' => $DocumentSubtypes,'onchange'=>'documenttype(this.value)']); ?>
												    <span id="document_subtype_error" class="text-danger" style="display:none;">Please select a document type.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <div class="input text">
                                                <?php echo $this->Form->control('year_id', ['class' => 'form-control','label' => ['text' => 'Year <span style="color:red">*</span>', 'escape' => false], 'error' => false, 'empty' => 'Select Year', 'options' => ($Years) ? $Years : '']); ?>
												<span id="year_error" class="text-danger" style="display:none;">Please select a year.</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-10">
											<input type="hidden"  name="preId" id="preId" value="<?php echo $preId;?>">
											<input type="hidden"  name="count" id="count" value="0">
                                                <button type="submit" class="btn btn-secondary" onclick="showstudentdata1();"><i
                                                        class="fas fa-search"></i>&nbsp; Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

      
                        <div class="panel panel-red">
                            <div class="panel-body pan">
                                <div class="form-body pal">

                                 

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive" style="overflow:auto">
                                                        <table id="bookTables"
                                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                            <thead class="info">
                                                                <tr>
                                                                   
                                                                    <th scope="col">
                                                                        Document Type
                                                                    </th>
                                                                    <th scope="col">Year
                                                                    </th>
                                                                    <th scope="col">
                                                                        Title
                                                                    </th>
                                                                    <th scope="col">
                                                                     Keywords
                                                                    </th>
                                                                  
                                                             <th scope="col">
                                                                        File
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               
                                                            </tbody>
                                                        </table>
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
</div>
<script type="text/javascript">
 $(function () {
 if($('#document-subtype-id').val()!="" && $('#year-id').val()!=""){
        $('#bookTables').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                'url': "<?php echo $this->Url->build('/', true) ?>admin/go_records/ajaxgorecords",
                "type": "GET",
                'datatype': 'json',
                "data": function(d) {

                    return $.extend({}, d, {
                        page: (d.start / d.length) + 1,
                        document_subtype_id: $('#document-subtype-id').val(),
						year_id: $('#year-id').val()
                    });
                },
                "dataSrc": function(response) {
                    return response.data;
                }
            },
            "columns": [
					{ "data": "document_type", "title": "Document Type" },
					{ "data": "year", "title": "Year" },
					{ "data": "title", "title": "Title" },
					{ "data": "keywords","title":"Keywords" },
					{
					"data": "path","title":"File",
					"render": function(data, type, row, meta) {
						return '<a href="<?php echo $this->Url->build('/', true) ?>uploads/e-Governance/' + data + '" target="_blank"><span style="color:#1ECBE4;"><i class="fas fa-file-pdf"></i>&nbsp;View Enclosure</span></a><a href="<?php echo $this->Url->build(['action' => 'edit']) ?>/' + data + '" target="_blank"><span style="color:#1ECBE4;"><i class="fas fa-edit"></i>&nbsp;Edit</span></a>';
					}
				}
				],
            "pageLength": 10, // Number of records per page
            "lengthMenu": [10, 25, 50, 100], // Options for records per page
            "searching": true, // Enable searching
            "ordering": true, // Enable sorting
            //"stateSave": true,
            "dom": 'Bfrtip', // Add buttons
            "buttons": [{
                    extend: 'excel',
                    text: 'Download Excel',
                    action: function(e, dt, button, config) {
                        // Manually get all records from the server
                        $.ajax({
                           'url': "<?php echo $this->Url->build('/', true) ?>admin/go_records/ajaxgorecords",
                            type: 'GET',
                            data: {
                                page: 1, // Force it to fetch all records
                                length: 1000000,
                                document_subtype_id: $('#document-subtype-id').val(),
						           year_id: $('#year-id').val()
                            },
                            success: function(response) {
                                var responsedata = JSON.parse(response);
                                var allData = responsedata.transformedData;
                                // Export the data as Excel (using SheetJS)
                                var wb = XLSX.utils.book_new();
                                var ws = XLSX.utils.aoa_to_sheet(allData);
                                XLSX.utils.book_append_sheet(wb, ws, "Books");
                                XLSX.writeFile(wb, "books.xlsx");

                            }
                        });
                    }
                },

            ]
        });
		}
    });

  

    function showstudentdata1() {
	 const dropdown = document.getElementById('document-subtype-id');
     const errorSpan = document.getElementById('document_subtype_error');
    
	if (dropdown.value === '') {

		errorSpan.style.display = 'inline';
	} else {
		errorSpan.style.display = 'none';
	}
	 const dropdown1 = document.getElementById('year-id');
	const errorSpan1 = document.getElementById('year_error');
	
	if (dropdown1.value === '') {

		errorSpan1.style.display = 'inline';
	} else {
		errorSpan1.style.display = 'none';
	}
	if($('#document-subtype-id').val()!="" && $('#year-id').val()!=""){
            if ($.fn.DataTable.isDataTable('#bookTables')) {
                $('#bookTables').DataTable().clear().destroy();
            }

            $('#bookTables tbody').empty();
            $('#bookTables').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                   'url': "<?php echo $this->Url->build('/', true) ?>admin/go_records/ajaxgorecords",
                    "type": "GET",
                    'datatype': 'json',
                    "data": function(d) {
                        return $.extend({}, d, {
                            page: (d.start / d.length) + 1,
                            document_subtype_id: $('#document-subtype-id').val(),
						    year_id: $('#year-id').val()
                        });
                    },
                    "dataSrc": function(response) {
                        return response.data; // Correct data reference
                    }
                },
                "columns": [
					{ "data": "document_type", "title": "Document Type" },
					{ "data": "year", "title": "Year" },
					{ "data": "title", "title": "Title" },
					{ "data": "keywords","title":"Keywords" },
					{
					"data": "path","title":"File",
					"render": function(data, type, row, meta) {
						return '<a href="<?php echo $this->Url->build('/', true) ?>uploads/e-Governance/' + data + '" target="_blank"><span style="color:#1ECBE4;"><i class="fas fa-file-pdf"></i>&nbsp;View Enclosure</span></a><a href="<?php echo $this->Url->build(['action' => 'edit']) ?>/' + row.OldrecordId + '" target="_blank"><span style="color:#1ECBE4;"><i class="fas fa-edit"></i>&nbsp;Edit</span></a>';
					}
				}
				],
                "pageLength": 10,
                "lengthMenu": [10, 25, 50, 100],
                "searching": true,
                "ordering": true,
                "dom": 'Bfrtip'
            });
			}

        
    }

  $(function() {
        $("#FormID").validate({
            rules: {
			    'document_type': {
                    required: true
                },
                'document_subtype_id': {
                    required: true
                },
               'year_id': {
                required: function () {
                    return $('#count').val() == '1';
                }
            }
            },

            messages: {
			 'document_type': {
                    required: "Select District Type"
                },
                'document_subtype_id': {
                    required: "Select Document Type"
                },
                'year_id': {
                    required: "Select Year"
                }
            },
            submitHandler: function(form) {
                form.submit();
                $(".btn").prop('disabled', true);
            }
        });
    });

    // function loadtaluk(dist_name) {
    //     $('#village').val('');
    //     var dist_name;
    //     $.ajax({
    //         async: true,
    //         dataType: "html",
    //         url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxgettaluks/" + dist_name,
    //         beforeSend: function(xhr) {
    //             xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
    //         },
    //         success: function(data, textStatus) {
    //             $('#taluk').html(data);
    //         }
    //     });


    // }

    // function loadvillage(taluk_name) {
    //     var taluk_name;
    //     $.ajax({
    //         async: true,
    //         dataType: "html",
    //         url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxgetvillages/" + taluk_name,
    //         beforeSend: function(xhr) {
    //             xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
    //         },
    //         success: function(data, textStatus) {
    //             $('#village').html(data);
    //         }
    //     });


    // }

    function documenttype(dist_id) {
        $('#year-id').val('');
		var preId=$('#preId').val();
   
        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true) ?>admin/go_records/ajaxdocumenttypes/" + dist_id+"/"+preId,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(data, textStatus) {
                if ($('#year-id option').length > 1) {
					$('#count').val(1);
					$('#year-id').html(data);
					
				} else {
				$('#count').val(0);
				}
            }
        });


    }



    function loadvillage(taluk_id) {
        var taluk_id;
        var district_id = $('#district-id').val();
        // alert(district_id);
        // alert(taluk_id);
        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxoptionifrvillages/" + district_id + '/' + taluk_id,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(data, textStatus) {
                $('#village-id').html(data);
            }
        });


    }
</script>
