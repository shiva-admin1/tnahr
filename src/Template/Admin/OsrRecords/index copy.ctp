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
                                <div class="caption"><?php echo "OSR Records"?></div>
                                <div class="actions">
                                    <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;Add OSR Records',array('action'=>'add'), array('escape' => false,'class'=>'btn btn-success','target'=>'_blank'));?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <?php if(isset($osrRecords)){ ?>
                                <?php if(count($osrRecords) >0){
							?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive" style="overflow:none">
                                            <table id="table_id"
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col"><?= $this->Paginator->sort('sno') ?></th>
                                                        <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                                                        <th scope="col"><?= $this->Paginator->sort('taluk') ?></th>
                                                        <th scope="col"><?= $this->Paginator->sort('village') ?></th>
                                                        <th scope="col"><?= $this->Paginator->sort('from_survey') ?>
                                                        </th>
                                                        <th scope="col"><?= $this->Paginator->sort('to_survey') ?></th>
                                                        <th scope="col"><?= $this->Paginator->sort('page_no') ?></th>
                                                        <th scope="col"><?= $this->Paginator->sort('Action') ?></th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php $sno =1; foreach ($osrRecords as $records): ?>
                                                    <tr>
                                                        <td><?php echo($sno); ?></td>
                                                        <td><?= h($records->district_name) ?></td>
                                                        <td><?= h($records->taluk_name) ?></td>
                                                        <td><?= h($records->village_name) ?></td>
                                                        <td><?= h($records->from_survey_no) ?></td>
                                                        <td><?= h($records->to_survey_no) ?></td>
                                                        <td><?= h($records->page_no) ?></td>
                                                        <td><?php echo $this->Html->link(__('<i class="fa fa-eye"></i>&nbsp;View'), ['action' => 'view', $records->id],['escape' => false,'class'=>'btn btn-success btn-xs']) ?>
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