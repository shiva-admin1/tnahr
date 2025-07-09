<style type="text/css">
.error {
    color: red;
}
.table{
  pointer-events: none;
}
    
    
}
</style>
<div class="row">
    <?php $error = $this->Session->flash();?>
    <?php if ($error != '') {?>
    <div class="col-lg-12">
        <div class="note note-success"> <?php echo $error; ?> </div>
    </div>
    <?php }?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption"><?php echo "Record Count Reports" ?></div>
                            </div>
                        </div>
                        <?php echo $this->Form->create('', ['id' => 'FormID', 'class' => 'form-horizontal col s12 m12', "autocomplete" => "off", 'enctype' => 'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-md-12"><label for="inputContent">Record Type<span class="require">&nbsp;*</span></label>
                                                <div class="input text">
                                                    <?php echo $this->Form->control('record_type', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select Record Type', 'options' => $recordTypes]); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-md-12"><label for="inputContent">Report Type<span class="require">&nbsp;*</span></label>
                                                <div class="input text">
                                                    <?php echo $this->Form->control('report_type', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select Report Type', 'options' => ($reportTypes) ? $reportTypes : '']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3 go_filter" <?php if ($report_type != 1) {?>style="display:none;"
                                        <?php }?>>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('go_department_id', ['class' => 'form-control', 'label' => 'Department', 'error' => false, 'empty' => 'Select Department']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 beic_filter" <?php if ($report_type != 4) {?>style="display:none;"
                                        <?php }?>>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('beicdepartment', ['class' => 'form-control', 'label' => 'Department', 'error' => false, 'options' => $beicdepartments, 'empty' => 'Select Department']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 doctype" style="display:none;">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('document_subtype_id', ['class' => 'form-control', 'label' => 'Document Type', 'error' => false, 'empty' => 'Select Document Type']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 vr_const" style="display:none;">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('vrconstituency', ['class' => 'form-control', 'label' => 'Constituency', 'error' => false, 'empty' => 'Select Constituency', 'options' => $vrconstituencys]); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="fmb_filter">
                                    <div class="col-md-12">
                                        <div class="col-md-3 fmb_d"
                                            <?php if($report_type != 15 && $report_type != 16){?>style="display:none;"
                                            <?php } ?>>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('fmb_district', ['class' => 'form-control', 'label' => 'District', 'error' => false, 'empty' => 'Select District', 'options' => $fmbdistricts]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 fmb_t" <?php if($report_type != 16){?>style="display:none;"
                                            <?php } ?>>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('fmb_taluk', ['class' => 'form-control', 'label' => 'Taluk', 'error' => false, 'empty' => 'Select Taluk', 'options' => ($fmbtaluks) ? $fmbtaluks : '']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 fmb_v" style="display:none;">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('fmb_village', ['class' => 'form-control', 'label' => 'Village', 'error' => false, 'empty' => 'Select Village', 'options' => ($fmbvillages) ? $fmbvillages : '']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="osr_filter">
                                    <div class="col-md-12">
                                        <div class="col-md-3 osr_d"
                                            <?php if($report_type != 19 && $report_type != 20){?>style="display:none;"
                                            <?php } ?>>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('osr_district', ['class' => 'form-control', 'label' => 'District', 'error' => false, 'empty' => 'Select District', 'options' => $osrdistricts]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 osr_t" <?php if($report_type != 20){?>style="display:none;"
                                            <?php } ?>>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('osr_taluk', ['class' => 'form-control', 'label' => 'Taluk', 'error' => false, 'empty' => 'Select Taluk', 'options' => ($osrtaluks) ? $osrtaluks : '']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 osr_v" style="display:none;">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('osr_village', ['class' => 'form-control', 'label' => 'Village', 'error' => false, 'empty' => 'Select Village', 'options' => ($osrvillages) ? $osrvillages : '']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ifr_filter">
                                    <div class="col-md-12">
                                        <div class="col-md-3 ifr_d"
                                            <?php if($report_type != 22 && $report_type != 23){?>style="display:none;"
                                            <?php } ?>>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('ifr_district', ['class' => 'form-control', 'label' => 'District', 'error' => false, 'empty' => 'Select District', 'options' => $ifrdistricts]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ifr_t" <?php if($report_type != 23){?>style="display:none;"
                                            <?php } ?>>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('ifr_taluk', ['class' => 'form-control', 'label' => 'Taluk', 'error' => false, 'empty' => 'Select Taluk', 'options' => ($ifrtaluks) ? $ifrtaluks : '']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ifr_v" style="display:none;">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('ifr_village', ['class' => 'form-control', 'label' => 'Village', 'error' => false, 'empty' => 'Select Village', 'options' => ($ifrvillages) ? $ifrvillages : '']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 voter_filter">
                                    <div class="col-md-3 vr_d"
                                        <?php if($report_type != 10 && $report_type != 11){?>style="display:none;"
                                        <?php } ?>>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('vr_district', ['class' => 'form-control', 'label' => 'District', 'error' => false, 'options' => ($vrdistricts) ? $vrdistricts : '', 'empty' => 'Select District']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 vr_t" <?php if($report_type != 11){?>style="display:none;"
                                        <?php } ?>>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('vr_taluk', ['class' => 'form-control', 'label' => 'Taluk', 'error' => false, 'empty' => 'Select Taluk', 'options' => ($vrtaluks) ? $vrtaluks : '']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 vr_v" style="display:none;">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('vr_village', ['class' => 'form-control', 'label' => 'Village', 'error' => false, 'options' => ($vrvillages) ? $vrvillages : '', 'empty' => 'Select Village', onchange => 'showyear()']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 vr_y" style="display:none;">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('vryear', ['class' => 'form-control', 'label' => 'Year', 'error' => false, 'empty' => 'Select Year', 'options' => $vryears]); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 br_filter">
                                    <div class="col-md-3 brauthor" style="display:none;">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('brauthor', ['class' => 'form-control', 'label' => 'Author', 'error' => false, 'empty' => 'Select Author', 'options' => ($authors) ? $authors : '']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 brpublisher" style="display:none;">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('brpublisher', ['class' => 'form-control', 'label' => 'Publisher', 'error' => false, 'empty' => 'Select Publisher', 'options' => ($publishers) ? $publishers : '']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-10">
                                                <button type="submit" class="btn btn-secondary"><i
                                                        class="fas fa-search"></i>&nbsp;
                                                    Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->End(); ?>

                    <?php  if($record_name != ''){  ?>
                    <div class="panel panel-red">
                        <div class="panel-body pan">
                            <div class="form-body pal">
							     <a href="#" id="export_excel_button" title="record count_details" style="float:right;margin-right:100px;"><img title="Excelsheet" src="<?php echo $this->Url->build('/', true)?>webroot/img/excel.png" height="22px"></a><br><br>
	                             <div id = "report1">
                                <?php  if($record_name != ''){  ?>
                                <center>
                                    <h4><b><?php echo $report_name." ".$record_name." Count"; ?></b>
                                    </h4><br>
                                </center><?php } ?>

                                <?php if ($fmbdoctyp != '' || $fmbdistrict != '' || $fmbtaluk != '' || $fmbvillage != '') {?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-offset-3">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('sno') ?>
                                                        </th>
                                                        <?php if ($report_type == 13) { ?>
                                                        <th scope="col">
                                                            <?php   echo $this->Paginator->sort('document_type'); ?>
                                                        </th>
                                                        <?php  } if(in_array($report_type,array(14,15,16))) { ?>
                                                        <th scope="col">
                                                            <?php  echo $this->Paginator->sort('district'); ?> </th>
                                                        <?php  } if(in_array($report_type,array(15,16))) { ?>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('taluk');?>
                                                        </th>
                                                        <?php  } if($report_type == 16) { ?>
                                                        <th scope="col">
                                                            <?php  echo $this->Paginator->sort('village');?>
                                                        </th>
                                                        <?php } ?>

                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('count'); ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($report_type == 13) {
                                                        $sno1 = 1;foreach ($fmbdoctyp as $fmbdt) {?>

                                                    <tr>
                                                        <td class="center"><?php echo ($sno1); ?></td>
                                                        <td><?php echo $fmbdt['fmbdoctypname']; ?></td>
                                                        <td class="right"><?php echo $fmbdt['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno1++;}
                                                    } else if ($report_type == 14) {

                                                        $sno2 = 1;foreach ($fmbdistrict as $fmbd) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno2); ?></td>
                                                        <td><?php echo $fmbd['fmbdistname']; ?></td>
                                                        <td class="right"><?php echo $fmbd['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno2++;}
                                                    }  else if ($report_type == 15) {

                                                        $sno3 = 1;foreach ($fmbtaluk as $fmbt) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno3); ?></td>
                                                        <td><?php echo $fmbt['fmbdistname']; ?></td>
                                                        <td><?php echo $fmbt['fmbtalukname']; ?></td>
                                                        <td class="right"><?php echo $fmbt['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno3++;}
                                                    }  else if ($report_type == 16) {

                                                        $sno4 = 1;foreach ($fmbvillage as $fmbv) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno4); ?></td>
                                                        <td><?php echo $fmbv['fmbdistname']; ?></td>
                                                        <td><?php echo $fmbv['fmbtalukname']; ?></td>
                                                        <td><?php echo $fmbv['fmbvillagename']; ?></td>
                                                        <td class="right"><?php echo $fmbv['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno4++;}
                                                    }
                                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>


                                <?php if ($osrdoctyp != '' || $osrdistrict != '' || $osrtaluk != '' || $osrvillage != '') {?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-offset-3">
                                        <div class="table-responsive" style="overflow:none">
                                            <table
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('sno') ?>
                                                        </th>
                                                        <?php if ($report_type == 17) { ?>
                                                        <th scope="col">
                                                            <?php   echo $this->Paginator->sort('document_type'); ?>
                                                        </th>
                                                        <?php  } if(in_array($report_type,array(18,19,20))) { ?>
                                                        <th scope="col">
                                                            <?php  echo $this->Paginator->sort('district'); ?>
                                                        </th>
                                                        <?php  } if(in_array($report_type,array(19,20))) { ?>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('taluk');?>
                                                        </th>
                                                        <?php  } if($report_type == 20) { ?>
                                                        <th scope="col">
                                                            <?php  echo $this->Paginator->sort('village');?>
                                                        </th>
                                                        <?php } ?>

                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('count'); ?>
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($report_type == 17) {
                                                        $sno1 = 1;foreach ($osrdoctyp as $osrdt) {?>

                                                    <tr>
                                                        <td class="center"><?php echo ($sno1); ?></td>
                                                        <td><?php echo $osrdt['osrdoctypname']; ?></td>
                                                        <td class="right"><?php echo $osrdt['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno1++;}
                                                    } else if ($report_type == 18) {

                                                        $sno2 = 1;foreach ($osrdistrict as $osrd) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno2); ?></td>
                                                        <td><?php echo $osrd['osrdistname']; ?></td>
                                                        <td class="right"><?php echo $osrd['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno2++;}
                                                    }  else if ($report_type == 19) {

                                                        $sno3 = 1;foreach ($osrtaluk as $osrt) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno3); ?></td>
                                                        <td><?php echo $osrt['osrdistname']; ?></td>
                                                        <td><?php echo $osrt['osrtalukname']; ?></td>
                                                        <td class="right"><?php echo $osrt['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno3++;}
                                                    }  else if ($report_type == 20) {

                                                        $sno4 = 1;foreach ($osrvillage as $osrv) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno4); ?></td>
                                                        <td><?php echo $osrv['osrdistname']; ?></td>
                                                        <td><?php echo $osrv['osrtalukname']; ?></td>
                                                        <td><?php echo $osrv['osrvillagename']; ?></td>
                                                        <td class="right"><?php echo $osrv['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno4++;}
                                                    }
                                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>


                                <?php if ($ifrdistrict != '' || $ifrtaluk != '' || $ifrvillage != '') {?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-offset-3">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('sno'); ?>
                                                        </th>

                                                        <?php if(in_array($report_type,array(21,22,23))) { ?>
                                                        <th scope="col">
                                                            <?php  echo $this->Paginator->sort('district'); ?>
                                                        </th>
                                                        <?php  } if(in_array($report_type,array(22,23))) { ?>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('taluk');?>
                                                        </th>
                                                        <?php  } if($report_type == 23) { ?>
                                                        <th scope="col">
                                                            <?php  echo $this->Paginator->sort('village');?>
                                                        </th>
                                                        <?php } ?>

                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('count'); ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($report_type == 21) {
                                                        $sno1 = 1;foreach ($ifrdistrict as $ifrd) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno1); ?></td>
                                                        <td><?php echo $ifrd['ifrdistname']; ?></td>
                                                        <td class="right"><?php echo $ifrd['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno1++;}
                                                    }  else if ($report_type == 22) {
                                                        $sno2 = 1;foreach ($ifrtaluk as $ifrt) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno2); ?></td>
                                                        <td><?php echo $ifrt['ifrdistname']; ?></td>
                                                        <td><?php echo $ifrt['ifrtalukname']; ?></td>
                                                        <td class="right"><?php echo $ifrt['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno2++;}
                                                    }  else if ($report_type == 23) {
                                                        $sno3 = 1;foreach ($ifrvillage as $ifrv) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno3); ?></td>
                                                        <td><?php echo $ifrv['ifrdistname']; ?></td>
                                                        <td><?php echo $ifrv['ifrtalukname']; ?></td>
                                                        <td><?php echo $ifrv['ifrvillagename']; ?></td>
                                                        <td class="right"><?php echo $ifrv['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno3++;}
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>


                                <?php if ($godoctyp != '' || $godept != '') {?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-offset-3">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('sno'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php if ($report_type == 1) {
                                                                echo $this->Paginator->sort('department');
                                                            } else {echo $this->Paginator->sort('go_type');
                                                            }?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('count'); ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($report_type == 2) {
                                                        $sno1 = 1;foreach ($godoctyp as $godt) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno1); ?></td>
                                                        <td><?php echo $godt['godoctypname']; ?></td>
                                                        <td class="right"><?php echo $godt['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno1++;}
                                                    } else if ($report_type == 1) {
                                                        $sno2 = 1;foreach ($godept as $god) {?>

                                                    <tr>
                                                        <td class="center"><?php echo ($sno2); ?></td>
                                                        <td><?php echo $god['gdeptname']; ?></td>
                                                        <td class="right"><?php echo $god['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno2++;}
                                                    }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>


                                <?php if ($bpRecords != '') {?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-offset-3">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('sno'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('BP_Type'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('Count'); ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno = 1;foreach ($bpRecords as $bp): ?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno); ?></td>
                                                        <td><?php echo $bp['bpdoctypname']; ?></td>
                                                        <td class="right"><?php echo $bp['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno++;endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>


                                <?php if ($beicdept != '' || $beicdoctyp != '') {?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-offset-3">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('sno'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php if ($report_type == 4) {
                                                                echo $this->Paginator->sort('department');
                                                            } else {
                                                                echo $this->Paginator->sort('document_type');
                                                            }?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('count'); ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($report_type == 4) {
                                                        $sno1 = 1;foreach ($beicdept as $beicd) {?>

                                                    <tr>
                                                        <td class="center"><?php echo ($sno1); ?></td>
                                                        <td><?php echo $beicd['beicdeptname']; ?></td>
                                                        <td class="right"><?php echo $beicd['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno1++;}
                                                    } else if ($report_type == 5) {

                                                        $sno2 = 1;foreach ($beicdoctyp as $beicdt) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno2); ?></td>
                                                        <td><?php echo $beicdt['beicdoctypname']; ?></td>
                                                        <td class="right"><?php echo $beicdt['valcount']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php $sno2++;}
                                                    }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>


                                <?php if ($gazettes != '') {?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-offset-3">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('sno'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('Gazettes_Type'); ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('count'); ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sno = 1;foreach ($gazettes as $gz): ?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno); ?></td>
                                                        <td><?php echo $gz['gzdoctypname']; ?></td>
                                                        <td class="right"><?php echo $gz['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno++;endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>


                                <?php if ($vrdoctyp != '' || $vrconst != '' || $vrdistrict != '' || $vrtaluk != '' || $vrvillage != '') {?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-offset-3">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('sno'); ?>
                                                        </th>

                                                        <th scope="col"
                                                            <?php if($report_type != 7){?>style="display:none;"
                                                            <?php } ?>>
                                                            <?php if ($report_type == 7) {
                                                                echo $this->Paginator->sort('document_type');
                                                            } ?>
                                                        </th>
                                                        <th scope="col"
                                                            <?php if($report_type != 8){?>style="display:none;"
                                                            <?php } ?>>
                                                            <?php if ($report_type == 8) {
                                                                echo $this->Paginator->sort('constituency');
                                                            }?>
                                                        </th>

                                                        <?php if(in_array($report_type,array(9,10,11))) { ?>
                                                        <th scope="col">
                                                            <?php  echo $this->Paginator->sort('district'); ?>
                                                        </th>
                                                        <?php  } if(in_array($report_type,array(10,11))) { ?>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('taluk');?>
                                                        </th>
                                                        <?php  } if($report_type == 11) { ?>
                                                        <th scope="col">
                                                            <?php  echo $this->Paginator->sort('village');?>
                                                        </th>
                                                        <?php } ?>

                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('count'); ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($report_type == 7) {
                                                        $sno1 = 1;foreach ($vrdoctyp as $vrdt) {?>

                                                    <tr>
                                                        <td class="center"><?php echo ($sno1); ?></td>
                                                        <td><?php echo $vrdt['vrdoctypname']; ?></td>
                                                        <td class="right"><?php echo $vrdt['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno1++;}
                                                    } else if ($report_type == 8) {

                                                        $sno2 = 1;foreach ($vrconst as $vrc) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno2); ?></td>
                                                        <td><?php echo $vrc['vrconstname']; ?></td>
                                                        <td class="right"><?php echo $vrc['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno2++;}
                                                    }  else if ($report_type == 9) {

                                                        $sno3 = 1;foreach ($vrdistrict as $vrd) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno3); ?></td>
                                                        <td><?php echo $vrd['vrdistname']; ?></td>
                                                        <td class="right"><?php echo $vrd['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno3++;}
                                                    }  else if ($report_type == 10) {

                                                        $sno4 = 1;foreach ($vrtaluk as $vrt) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno4); ?></td>
                                                        <td><?php echo $vrt['vrdistname']; ?></td>
                                                        <td><?php echo $vrt['vrtalukname']; ?></td>
                                                        <td class="right"><?php echo $vrt['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno4++;}
                                                    }  else if ($report_type == 11) {

                                                        $sno5 = 1;foreach ($vrvillage as $vrv) {?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno5); ?></td>
                                                        <td><?php echo $vrv['vrdistname']; ?></td>
                                                        <td><?php echo $vrv['vrtalukname']; ?></td>
                                                        <td><?php echo $vrv['vrvillagename']; ?></td>
                                                        <td class="right"><?php echo $vrv['valcount']; ?></td>
                                                    </tr>
                                                    <?php $sno5++;}
                                                    }
                                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>


                                <?php if ($bookRecords != '') {?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-offset-3">
                                        <div class="table-responsive" style="overflow:auto">
                                            <table
                                                class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead class="info">
                                                    <tr>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('sno') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('document_type_id') ?>
                                                        </th>
                                                        <th scope="col">
                                                            <?php echo $this->Paginator->sort('count') ?>
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php $sno = 1;foreach ($bookRecords as $bookRecord): ?>
                                                    <tr>
                                                        <td class="center"><?php echo ($sno); ?></td>
                                                        <td><?php echo $bookRecord['brdoctypname'] ?></td>
                                                        <td><?php echo $bookRecord['valcount'] ?></td>
                                                    </tr>
                                                    <?php $sno++;endforeach;?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                             </div>     
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
<?php if (isset($record_type)) {
    ?>
//alert("hi");
var subtype = <?php echo ($subtype_id != '') ? $subtype_id : 0; ?>;
var record_type = <?php echo $record_type; ?>;
$.ajax({
    async: true,
    dataType: "html",
    url: "<?php echo $this->Url->build('/', true) ?>admin/reports/ajaxdocsubtype/" +
        record_type,
    method: 'get',
    success: function(data, textStatus) {
        //alert(data);
        $('#document-subtype-id').html(data);
        if (subtype != '') {
            $('#document-subtype-id').val(subtype);
        }

    }
});
<?php }?>

$(function() {
    $("#FormID").validate({
        rules: {
            'record_type': {
                required: true
            },
            'report_type': {
                required: true
            }
        },

        messages: {
            'record_type': {
                required: "Select Record Type!"
            },
            'report_type': {
                required: "Select Report Type!"
            }
        },
        submitHandler: function(form) {

            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});


$('#record-type').change(function() {

    // FMB filter
    $('#fmb-district').val('');
    $('.fmb_d').hide();
    $('#fmb-taluk').val('');
    $('.fmb_t').hide();

    // OSR filter
    $('#osr-district').val('');
    $('.osr_d').hide();
    $('#osr-taluk').val('');
    $('.osr_t').hide();

    // IFR filter
    $('#ifr-district').val('');
    $('.ifr_d').hide();
    $('#ifr-taluk').val('');
    $('.ifr_t').hide();

    // GO filter
    $('.go_filter').hide();
    $('#go-department-id').val('');

    // BEIC filter
    $('.beic_filter').hide();
    $('#beicdepartment').val('');

    // Voter filter
    $('.vr_d').hide();
    $('#vr-district').val('');
    $('.vr_t').hide();
    $('#vr-taluk').val('');

    //Book filter
    $('.br_filter').hide();
    $('.brauthor').val('');
    $('.brpublisher').val('');

    var recordType = $('#record-type').val();

    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/reports/ajaxgetreporttype/" +
            recordType,
        method: 'get',
        success: function(data, textStatus) {
            $('#report-type').html(data);
        }
    });

    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/reports/ajaxdocsubtype/" +
            recordType,
        method: 'get',
        success: function(data, textStatus) {
            $('#document-subtype-id').html(data);
        }
    });
});

$('#report-type').change(function() {

    var reportType = $('#report-type').val();

    if (reportType == 1) {

        $('.go_filter').hide();
        $('.ifr_filter').hide();
        $('.doctype').hide();
        $('.beic_filter').hide();
        $('.voter_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#go-department-id').val('');

    } else if (reportType == 2) {

        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.go_filter').hide();
        $('.beic_filter').hide();
        $('.voter_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#document-subtype-id').val('');

    } else if (reportType == 3) {

        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.go_filter').hide();
        $('.beic_filter').hide();
        $('.voter_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#go-department-id').val('');

    } else if (reportType == 4) {

        $('.beic_filter').hide();
        $('.ifr_filter').hide();
        $('.doctype').hide();
        $('.go_filter').hide();
        $('.voter_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#document-subtype-id').val('');
        $('#go-department-id').val('');

    } else if (reportType == 5) {

        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.voter_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 6) {

        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.voter_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 7) {

        $('.doctype').hide();
        $('.vr_v').hide();
        $('.vr_d').hide();
        $('.vr_t').hide();
        $('.vr_y').hide();
        $('#vr-district').val('');
        $('#vr-taluk').val('');
        $('.vr_const').hide();
        $('.beic_filter').hide();
        $('.ifr_filter').hide();
        $('.go_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 8) {

        $('.vr_const').hide();
        $('.vr_v').hide();
        $('.vr_d').hide();
        $('.vr_t').hide();
        $('.vr_y').hide();
        $('#vr-district').val('');
        $('#vr-taluk').val('');
        $('.doctype').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.ifr_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 9) {

        $('.vr_d').hide();
        $('.vr_t').hide();
        $('.vr_v').hide();
        $('.vr_y').hide();
        $('#vr-district').val('');
        $('#vr-taluk').val('');
        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.vr_const').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 10) {

        $('.vr_v').hide();
        $('.vr_d').show();
        $('.vr_t').hide();
        $('.vr_y').hide();
        $('#vr-district').val('');
        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 11) {

        $('.vr_v').hide();
        $('.vr_d').show();
        $('.vr_t').show();
        $('#vr-district').val('');
        $('#vr-taluk').val('');
        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.br_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 12) {

        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.fmb_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

        if ('#document-subtype-id' == 44) {
            $('.brauthor').show();
            $('.brpublisher').show();
        } else {
            $('.brauthor').hide();
            $('.brpublisher').hide();
        }

    } else if (reportType == 13) {

        $('.doctype').hide();
        $('.fmb_d').hide();
        $('#fmb-district').val('');
        $('.fmb_t').hide();
        $('#fmb-taluk').val('');
        $('.fmb_v').hide();
        $('.ifr_filter').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 14) {

        $('.fmb_d').hide();
        $('#fmb-district').val('');
        $('.fmb_t').hide();
        $('#fmb-taluk').val('');
        $('.fmb_v').hide();
        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 15) {

        $('.fmb_d').show();
        $('.fmb_t').hide();
        $('#fmb-district').val('');
        $('.fmb_v').hide();
        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 16) {

        $('.fmb_d').show();
        $('.fmb_t').show();
        $('.fmb_v').hide();
        $('#fmb-district').val('');
        $('#fmb-taluk').val('');
        $('.doctype').hide();
        $('.ifr_filter').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.osr_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 17) {

        $('.doctype').hide();
        $('.osr_d').hide();
        $('.osr_t').hide();
        $('.osr_v').hide();
        $('#osr-district').val('');
        $('#osr-taluk').val('');
        $('.ifr_filter').hide();
        $('.fmb_filter').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 18) {

        $('.osr_d').hide();
        $('.osr_t').hide();
        $('.osr_v').hide();
        $('#osr-district').val('');
        $('#osr-taluk').val('');
        $('.ifr_filter').hide();
        $('.fmb_filter').hide();
        $('.doctype').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 19) {

        $('.osr_d').show();
        $('.osr_t').hide();
        $('.osr_v').hide();
        $('#osr-district').val('');
        $('.ifr_filter').hide();
        $('.fmb_filter').hide();
        $('.doctype').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 20) {

        $('.osr_d').show();
        $('.osr_t').show();
        $('.osr_v').hide();
        $('#osr-district').val('');
        $('#osr-taluk').val('');
        $('.ifr_filter').hide();
        $('.fmb_filter').hide();
        $('.doctype').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 21) {

        $('.ifr_d').hide();
        $('.ifr_t').hide();
        $('.ifr_v').hide();
        $('#ifr-district').val('');
        $('#ifr-taluk').val('');
        $('.osr_filter').hide();
        $('.fmb_filter').hide();
        $('.doctype').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 22) {

        $('.ifr_d').show();
        $('.ifr_t').hide();
        $('.ifr_v').hide();
        $('#ifr-district').val('');
        $('.osr_filter').hide();
        $('.fmb_filter').hide();
        $('.doctype').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    } else if (reportType == 23) {

        $('.ifr_d').show();
        $('.ifr_t').show();
        $('.ifr_v').hide();
        $('#ifr-district').val('');
        $('#ifr-taluk').val('');
        $('.osr_filter').hide();
        $('.fmb_filter').hide();
        $('.doctype').hide();
        $('.br_filter').hide();
        $('.voter_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('#beicdepartment').val('');
        $('#go-department-id').val('');

    }
});


$('#fmb-district').change(function() {
    $('#fmb-taluk').val('');
    var fmbdistrict = $('#fmb-district').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/fmb_records/ajaxgettaluks/" +
            fmbdistrict,
        method: 'get',
        success: function(data, textStatus) {
            $('#fmb-taluk').html(data);
        }
    });
});


$('#fmb-taluk').change(function() {

    var fmbtaluk = $('#fmb-taluk').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/fmb_records/ajaxgetvillages/" +
            fmbtaluk,
        method: 'get',
        success: function(data, textStatus) {
            $('#fmb-village').html(data);
        }
    });
});


$('#osr-district').change(function() {
    $('#osr-taluk').val('');
    var osrdistrict = $('#osr-district').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/osr_records/ajaxgettaluks/" +
            osrdistrict,
        method: 'get',
        success: function(data, textStatus) {
            $('#osr-taluk').html(data);
        }
    });
});


$('#osr-taluk').change(function() {

    var osrtaluk = $('#osr-taluk').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/osr_records/ajaxgetvillages/" +
            osrtaluk,
        method: 'get',
        success: function(data, textStatus) {
            $('#osr-village').html(data);
        }
    });
});



$('#ifr-district').change(function() {
    $('#ifr-taluk').val('');
    var ifrdistrict = $('#ifr-district').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxgettaluks/" +
            ifrdistrict,
        method: 'get',
        success: function(data, textStatus) {
            $('#ifr-taluk').html(data);
        }
    });
});


$('#ifr-taluk').change(function() {

    var ifrtaluk = $('#ifr-taluk').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxgetvillages/" +
            ifrtaluk,
        method: 'get',
        success: function(data, textStatus) {
            $('#ifr-village').html(data);
        }
    });
});

$('#vr-constituency').change(function() {

    var vrconstituency = $('#vr-constituency').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/voter_records/ajaxgetdistricts/" +
            vrconstituency,
        method: 'get',
        success: function(data, textStatus) {
            $('#vr-district').html(data);
        }
    });
});

$('#vr-district').change(function() {
    $('#vr-taluk').val('');
    var vrdistrict = $('#vr-district').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/voter_records/ajaxgettaluks/" +
            vrdistrict,
        method: 'get',
        success: function(data, textStatus) {
            $('#vr-taluk').html(data);
        }
    });
});


$('#vr-taluk').change(function() {

    var vrtaluk = $('#vr-taluk').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/voter_records/ajaxgetvillages/" +
            vrtaluk,
        method: 'get',
        success: function(data, textStatus) {
            $('#vr-village').html(data);
        }
    });
});

function showyear() {

    $('.vr_y').show();

}

$('#document-subtype-id').change(function() {

    // $('#publisher-name').val('');
    // alert(doc_subtype);
    var doc_subtype = $('#document-subtype-id').val();
    if (doc_subtype == '44') {
        $('.brauthor').show();
        $('.brpublisher').show();
        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true) ?>admin/book_records/ajaxgetauthors/" +
                doc_subtype,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]')
                    .val());
            },
            success: function(data, textStatus) {
                //alert(data);
                $('#brauthor').html(data);
            }

        });
    } else if (doc_subtype != '44') {
        $('#brpublisher').val('');
        $('#brauthor').val('');
        $('.brauthor').hide();
        $('.brpublisher').hide();

    }
});

$('#brauthor').change(function() {

    $('#brpublisher').val('');
    var brauthor = $('#brauthor').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true) ?>admin/book_records/ajaxgetpublishers/" +
            brauthor,
        method: 'get',
        success: function(data, textStatus) {
            //alert(data);
            $('#brpublisher').html(data);
        }
    });
});

$(document).ready(function(){
var date = <?php echo date('Y_m_d_H_i_s'); ?>;
    $(function(){
    	$("#export_excel_button").click(function () {
			var filename = "<?php echo $report_name.'_'.$record_name.'_count_report'; ?>_"+date;
			var uri = $("#report1").btechco_excelexport({
					containerid: "report1", 
					datatype: $datatype.Table,
					returnUri: true
			   
			});
			$(this).attr('download', filename+".xls") // set file name (you want to put formatted date here)
               .attr('href', uri)                     // data to download
               .attr('target', '_blank')              // open in new window (optional)
    	    });
    });
});
</script>