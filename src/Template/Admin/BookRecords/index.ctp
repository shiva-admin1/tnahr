<style type="text/css">
.error {
    color: red;
}
</style>
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
                                <div class="caption"><?php echo "Books"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add Book',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8"><label for="inputContent">Record Type<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Record Type',onchange=>'loadauthor(this.value)']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <div class="input text author"
                                                <?php if($subtype_id != '44'){  ?>style="display:none;" <?php } ?>>
                                                <?php echo $this->Form->control('author',['class'=>'form-control','label'=>'Author','error'=>false,'empty'=>'Select Author','options'=>($authors)?$authors:'',onchange=>'loadpublisher(this.value)']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <div class="input text publisher" <?php if($subtype_id != '44'){  ?>
                                                style="display:none;" <?php } ?>>
                                                <?php echo $this->Form->control('publisher_name',['class'=>'form-control','label'=>'Publisher','error'=>false,'options'=>($publishers)?$publishers:'','empty'=>'Select Publisher']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-secondary"><i
                                                        class="fas fa-search"></i>&nbsp; Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->End();?>

                    <?php if($bookRecords != ''){  ?>
                    <div class="panel panel-red">
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if(isset($bookRecords)){ ?>
                                <?php if(count($bookRecords) >0){
							?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table id="table_id"
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col"><?php echo $this->Paginator->sort('sno') ?></th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('Record Type') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('title') ?>
                                                        </th>
                                                        <?php if($subtype_id == '44'){ ?>
                                                        <th scope="col author">
                                                            <?php echo $this->Paginator->sort('author') ?></th>
                                                        <?php }else{ echo "<style>.author{display:none;}</style>";?>
                                                        <?php }?>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('subject') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('publication_year') ?>
                                                        </th>
                                                        <?php if($subtype_id == '44'){ ?>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('publisher_name') ?>
                                                        </th>
                                                        <?php }?>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('accession_no') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('catalogue_no') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('Enclosure'); ?></th>
                                                        <th scope="col"><?php echo $this->Paginator->sort('Action') ?>
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; foreach ($bookRecords as $bookRecord): ?>
                                                    <tr>
                                                        <td class="center"><?php echo($sno); ?></td>
                                                        <td><?php echo $bookRecord['doc_subtype_name'] ?></td>
                                                        <td><?php echo $bookRecord['title'] ?></td>
                                                        <?php if($subtype_id == '44'){ ?>
                                                        <td class="author"><?php echo $bookRecord['author'] ?></td>
                                                        <?php }else{ echo "<style>.author{display:none;}</style>";?>
                                                        <?php }?>
                                                        <td><?php echo $bookRecord['subject'] ?></td>
                                                        <td class="center"><?php echo $bookRecord['publication_year'] ?>
                                                        </td>
                                                        <?php if($subtype_id == '44'){ ?>
                                                        <td><?php echo $bookRecord['publisher_name'] ?></td>
                                                        <?php }?>
                                                        <td class="right"><?php echo $bookRecord['accession_no'] ?></td>
                                                        <td class="right"><?php echo $bookRecord['catalogue_no'] ?></td>
                                                        <td class="center"> <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?><?php echo $bookRecord['file_path']; ?>"><span
                                                                    style="color:#1ECBE4;"><i
                                                                        class="fas fa-file-pdf"></i>&nbsp;View
                                                                    Enclosure</span>
                                                            </a></td>
                                                        <td class="center">
                                                            <?php echo $this->Html->link(__('<i class="far fa-edit"></i>&nbsp;Edit'), ['action' => 'edit', $bookRecord['id']],['escape' => false,'class'=>'btn btn-outline-info btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;
                                                            <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['action' => 'view', $bookRecord['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']) ?>
                                                            &nbsp;
                                                            <?php echo $this->Form->postLink(__('<i class="far fa-trash-alt"></i>&nbsp;Delete'), ['action' => 'delete',  $bookRecord['id']], ['confirm' => __('Are you sure you want to delete {0}?',  $bookRecord['title']),'escape' => false,'class'=>'btn btn-outline-danger btn-xs']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php $sno++; endforeach; ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php } else{ print "No Data available."; }?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        //"sScrollY": "600px",
        //	"sScrollX": "100%",
        "bScrollCollapse": true,
        "bPaginate": true,
        "searching": true,
        "fixedColumns": {
            leftColumns: 2
        }

    });
});
</script>
<script>
$(function() {
    $("#FormID").validate({
        rules: {
            'document_subtype_id': {
                required: true
            }
        },

        messages: {
            'document_subtype_id': {
                required: "Select Record Type"
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
        $('#publisher-name').val('');
        $('#author').val('');
        $('.author').hide();
        $('.publisher').hide();

    }


}

function loadpublisher(author) {
    var author;
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/book_records/ajaxgetpublishers/" + author,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(data, textStatus) {
            $('#publisher-name').html(data);
        }
    });


}
</script>