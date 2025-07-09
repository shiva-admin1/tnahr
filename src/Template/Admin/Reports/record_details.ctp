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
                                <div class="caption"><?php echo "Record Details"?></div>
                            </div>
                        </div>

                        <?php if($fmbRecords != ''){  ?>
                        <div class="panel panel-red">
                            <div class="panel-body pan">
                                <div class="form-body pal">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive" style="overflow:auto">
                                                <table id="table_id"
                                                    class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                    <thead class="info">
                                                        <tr>
                                                            <th scope="col"><?php echo$this->Paginator->sort('sno') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo$this->Paginator->sort('document_type') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo$this->Paginator->sort('district') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo$this->Paginator->sort('taluk') ?></th>
                                                            <th scope="col">
                                                                <?php echo$this->Paginator->sort('village') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo$this->Paginator->sort('survey_no') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo$this->Paginator->sort('remarks') ?>
                                                            </th>
                                                            <th scope="col"><?php echo$this->Paginator->sort('year') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo$this->Paginator->sort('page_no') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo$this->Paginator->sort('Action') ?>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <?php $sno =1; foreach ($fmbRecords as $records): ?>
                                                        <tr>
                                                            <td class="center"><?php echo($sno); ?></td>
                                                            <td><?php echo $records['doc_subtyp_name']; ?></td>
                                                            <td><?php echo $records['district_name'] ?></td>
                                                            <td><?php echo $records['taluk_name'] ?></td>
                                                            <td><?php echo $records['village_name'] ?></td>
                                                            <td class="right"><?php echo $records['survey_no'] ?></td>
                                                            <td><?php echo $records['remarks'] ?></td>
                                                            <td class="center"><?php echo $records['year'] ?></td>
                                                            <td class="right"><?php echo $records['page_no'] ?></td>
                                                            <td class="center">

                                                                <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['controller'=> 'FmbRecords','action' => 'view', $records['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>

                                                            </td>
                                                        </tr>
                                                        <?php $sno++; endforeach; ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>


                        <?php if($osrRecords != ''){  ?>
                        <div class="panel panel-red">
                            <div class="panel-body pan">
                                <div class="form-body pal">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive" style="overflow:none">
                                                <table id="table_id"
                                                    class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                    <thead class="info">
                                                        <tr>
                                                            <th scope="col"><?php echo $this->Paginator->sort('sno') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('document_type_id'); ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('district') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('taluk') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('village') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('from_survey') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('to_survey') ?></th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('page_no') ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('Action') ?>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <?php $sno =1; foreach ($osrRecords as $records): ?>
                                                        <tr>
                                                            <td class="center"><?php echo($sno); ?></td>
                                                            <td><?php echo $records['doc_subtyp_name']; ?></td>
                                                            <td><?php echo $records['district_name'] ?></td>
                                                            <td><?php echo $records['taluk_name'] ?></td>
                                                            <td><?php echo $records['village_name'] ?></td>
                                                            <td class="right"><?php echo $records['from_survey_no'] ?>
                                                            </td>
                                                            <td class="right"><?php echo $records['to_survey_no'] ?>
                                                            </td>
                                                            <td class="right"><?php echo $records['page_no'] ?></td>
                                                            <td class="center">

                                                                <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['controller'=> 'OsrRecords','action' => 'view', $records['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>

                                                            </td>
                                                        </tr>
                                                        <?php $sno++; endforeach; ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>


                        <?php if($ifrRecords != ''){  ?>
                        <div class="panel panel-red">
                            <div class="panel-body pan">
                                <div class="form-body pal">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive" style="overflow:auto">
                                                <table id="table_id"
                                                    class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                    <thead class="info">
                                                        <tr>
                                                            <th scope="col"><?php echo $this->Paginator->sort('sno'); ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('district'); ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('taluk'); ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('village'); ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('title_deed_no'); ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('sheet_no'); ?>
                                                            </th>
                                                            <th scope="col">
                                                                <?php echo $this->Paginator->sort('Document'); ?></th>
                                                            <!-- <th scope="col">
                                                            <?php echo $this->Paginator->sort('village_name'); ?></th> -->
                                                            <th scope="col" class="actions"><?php echo('Actions'); ?>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $sno =1; foreach ($ifrRecords as $ifr): ?>
                                                        <tr>
                                                            <td class="center"><?php echo($sno); ?></td>
                                                            <td><?php echo $ifr['district_name']; ?></td>
                                                            <td><?php echo $ifr['taluk_name']; ?></td>
                                                            <td><?php echo $ifr['village_name']; ?></td>
                                                            <td class="right"><?php echo $ifr['title_deed_no']; ?></td>
                                                            <td class="right"><?php echo $ifr['sheet_no']; ?></td>
                                                            <td class="center">
                                                                <a target="_blank"
                                                                    href="<?php echo $this->Url->build('/', true)?><?php echo $ifr['file_path']; ?>"><span
                                                                        style="color:#1ECBE4;"><i
                                                                            class="fas fa-file-pdf"></i>&nbsp;View
                                                                        Document</span></a>
                                                            </td>
                                                            <td class="center">
                                                                <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['controller'=> 'IfrRecords','action' => 'view', $ifr['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
                                                            </td>
                                                        </tr>
                                                        <?php $sno++; endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($goRecords != ''){  ?>
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive" style="overflow:auto">
                                        <table id="table_id"
                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                            <thead class="info">
                                                <tr>
                                                    <th scope="col"><?php echo $this->Paginator->sort('sno'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo 'GO Type'; ?></th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('department'); ?>
                                                    </th>
                                                    <th scope="col"><?php echo 'GO NO'; ?>
                                                    </th>
                                                    <th scope="col"><?php echo 'GO Date'; ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('subject'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Abstract_Copy'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Full_GO_Copy'); ?>
                                                    </th>
                                                    <th scope="col" class="actions"><?php echo('Actions'); ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sno =1; foreach ($goRecords as $go): ?>
                                                <tr>
                                                    <td class="center"><?php echo($sno); ?></td>
                                                    <td><?php echo $go['doc_subtype_name']; ?></td>
                                                    <td><?php echo $go['go_dept_name']; ?></td>
                                                    <td class="right"><?php echo $go['go_no']; ?></td>
                                                    <td class="right">
                                                        <?php echo date('d-m-Y',strtotime($go['go_date'])); ?>
                                                    </td>
                                                    <td><?php echo $go['abstract_subject']; ?></td>
                                                    <td class="center">
                                                        <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $go['abstract_file_path']; ?>"><span
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Abstract</span></a>
                                                    </td>
                                                    <td class="center">
                                                        <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $go['fulldoc_file_path']; ?>"><span
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Full GO</span></a>
                                                    </td>
                                                    <td class="center">
                                                        <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['controller'=>'GoRecords','action' => 'view', $go['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
                                                    </td>
                                                </tr>
                                                <?php $sno++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($bpRecords != ''){  ?>
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive" style="overflow:auto">
                                        <table id="table_id"
                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                            <thead class="info">
                                                <tr>
                                                    <th scope="col"><?php echo $this->Paginator->sort('sno'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('BP_Type'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('BP_NO'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('BP_Date'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('abstract_subject'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Document'); ?></th>
                                                    <th scope="col" class="actions"><?php echo('Actions'); ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sno =1; foreach ($bpRecords as $bp): ?>
                                                <tr>
                                                    <td class="center"><?php echo($sno); ?></td>
                                                    <td><?php echo $bp['doc_subtype_name']; ?></td>
                                                    <td class="right"><?php echo $bp['bp_no']; ?></td>
                                                    <td class="center">
                                                        <?php echo date('d-m-Y',strtotime($bp['bp_date'])); ?>
                                                    </td>
                                                    <td><?php echo $bp['abstract_subject']; ?></td>

                                                    <td class="center"> <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $bp['file_path']; ?>"><span
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Document</span>
                                                        </a></td>
                                                    <td class="center">
                                                        <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['controller'=>'BpRecords','action' => 'view', $bp['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
                                                    </td>
                                                </tr>
                                                <?php $sno++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>


                        <?php if($beicRecords != ''){  ?>
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive" style="overflow:auto">
                                        <table id="table_id"
                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                            <thead class="info">
                                                <tr>
                                                    <th scope="col"><?php echo $this->Paginator->sort('sno') ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('document_type_id') ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('department') ?>
                                                    </th>

                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('from_date') ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('to_date') ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('general_no') ?></th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('volume_no') ?></th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('document') ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Action') ?>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php $sno =1; foreach ($beicRecords as $beicRecord): ?>
                                                <tr>
                                                    <td class="center"><?php echo($sno); ?></td>
                                                    <td><?php echo $beicRecord['doc_subtype_name']; ?></td>
                                                    <td><?php echo $beicRecord['department']; ?></td>
                                                    <td class="center">
                                                        <?php echo date('d-m-Y',strtotime($beicRecord['fromdate'])) ?>
                                                    </td>
                                                    <td class="center">
                                                        <?php echo date('d-m-Y',strtotime($beicRecord['todate'])) ?>
                                                    </td>
                                                    <td class="right"><?php echo $beicRecord['general_no'] ?>
                                                    </td>
                                                    <td class="right"><?php echo $beicRecord['volume_no'] ?>
                                                    </td>
                                                    <td class="center"> <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $beicRecord['file_path']; ?>"><span
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Document</span>
                                                        </a></td>
                                                    <td class="center">
                                                        <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['controller'=>'BeicRecords','action' => 'view', $beicRecord['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']) ?>
                                                    </td>
                                                </tr>
                                                <?php $sno++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($gazettes != ''){  ?>
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive" style="overflow:auto">
                                        <table id="table_id"
                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                            <thead class="info">
                                                <tr>
                                                    <th scope="col"><?php echo $this->Paginator->sort('sno'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Gazettes_Type'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Notification_No'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Notification_Date'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Part'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Section'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Abstract/Subject'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Document'); ?></th>
                                                    <th scope="col" class="actions"><?php echo('Actions'); ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sno =1; foreach ($gazettes as $gazette): ?>
                                                <tr>
                                                    <td class="center"><?php echo($sno); ?></td>
                                                    <td><?php echo $gazette['doc_subtype_name']; ?></td>
                                                    <td class="center">
                                                        <?php echo $gazette['notification_no']; ?>
                                                    </td>
                                                    <td class="center">
                                                        <?php echo date('d-m-Y',strtotime($gazette['notification_date'])); ?>
                                                    </td>
                                                    <td><?php echo $gazette['gpart']; ?></td>
                                                    <td><?php echo $gazette['gsection']; ?></td>
                                                    <td><?php echo $gazette['abstract_subject']; ?></td>
                                                    <td class="center"> <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $gazette['file_path']; ?>"><span
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Document</span>
                                                        </a></td>
                                                    <td class="center">
                                                        <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['controller'=>'Gazettes','action' => 'view', $gazette['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
                                                    </td>
                                                </tr>
                                                <?php $sno++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($voterRecords != ''){  ?>
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive" style="overflow:auto">
                                        <table id="table_id"
                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                            <thead class="info">
                                                <tr>
                                                    <th scope="col"><?php echo $this->Paginator->sort('sno'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('record_year'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('document_type_id'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('constituency_no'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('constituency'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('district'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('taluk'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('village'); ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('document'); ?>
                                                    </th>
                                                    <th scope="col" class="actions"><?php echo('Actions'); ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sno =1; foreach ($voterRecords as $voterRecord): ?>
                                                <tr>
                                                    <td class="center"><?php echo ($sno); ?></td>
                                                    <td><?php echo $voterRecord['record_year']; ?></td>
                                                    <td><?php echo $voterRecord['doc_subtype_name']; ?></td>
                                                    <td class="right">
                                                        <?php echo $voterRecord['constituency_no']; ?>
                                                    </td>
                                                    <td><?php echo $voterRecord['constituency_name']; ?></td>
                                                    <td><?php echo $voterRecord['district_name']; ?></td>
                                                    <td><?php echo $voterRecord['taluk_name']; ?></td>
                                                    <td><?php echo $voterRecord['village_name']; ?></td>
                                                    <td class="center">
                                                        <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $voterRecord['file_path']; ?>"><span
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Document</span></a>
                                                    </td>
                                                    <td class="center">
                                                        <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['controller'=>'VoterRecords','action' => 'view', $voterRecord['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']); ?>
                                                    </td>

                                                </tr>
                                                <?php $sno++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($bookRecords != ''){  ?>
                        <div class="form-body pal">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive" style="overflow:auto">
                                        <table id="table_id"
                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                            <thead class="info">
                                                <tr>
                                                    <th scope="col"><?php echo $this->Paginator->sort('sno') ?>
                                                    </th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('document_type_id') ?>
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
                                                        <?php echo $this->Paginator->sort('Document'); ?></th>
                                                    <th scope="col">
                                                        <?php echo $this->Paginator->sort('Action') ?>
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
                                                    <td class="center">
                                                        <?php echo $bookRecord['publication_year'] ?>
                                                    </td>
                                                    <?php if($subtype_id == '44'){ ?>
                                                    <td><?php echo $bookRecord['publisher_name'] ?></td>
                                                    <?php }?>
                                                    <td class="right"><?php echo $bookRecord['accession_no'] ?>
                                                    </td>
                                                    <td class="right"><?php echo $bookRecord['catalogue_no'] ?>
                                                    </td>
                                                    <td class="center"> <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $bookRecord['file_path']; ?>"><span
                                                                style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Document</span>
                                                        </a></td>
                                                    <td class="center">
                                                        <?php echo $this->Html->link(__('<i class="far fa-eye"></i>&nbsp;View'), ['controller'=>'BookRecords','action' => 'view', $bookRecord['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs','target'=>'_blank']) ?>
                                                    </td>
                                                </tr>
                                                <?php $sno++; endforeach; ?>
                                            </tbody>
                                        </table>
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
</div>

<script type="text/javascript">
<?php  if(isset($report_type)){       
    ?>
//alert("hi");
var subtype = <?php echo ($subtype_id != '')?$subtype_id:0; ?>;
var reporttype = <?php echo $report_type; ?>;
$.ajax({
    async: true,
    dataType: "html",
    url: "<?php echo $this->Url->build('/', true)?>admin/reports/ajaxdocsubtype/" + reporttype,
    method: 'get',
    success: function(data, textStatus) {
        //alert(data);
        $('#document-subtype-id').html(data);
        if (subtype != '') {
            $('#document-subtype-id').val(subtype);
        }

    }
});
<?php } ?>

$(function() {
    $("#FormID").validate({
        rules: {
            'report_type': {
                required: true
            }
        },

        messages: {
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


$('#report-type').change(function() {

    var doctype = $('#report-type').val();
    //alert(doctype);

    if (doctype == 1) {

        $('.fmb_filter').show();
        $('.doctype').show();
        $('.osr_filter').hide();
        $('.ifr_filter').hide();
        $('.go_filter').hide();
        $('.beic_filter').hide();
        $('.voter_filter').hide();
        $('.vr_const').hide();
        $('.br_filter').hide();

    } else if (doctype == 2) {

        $('.osr_filter').show();
        $('.doctype').show();
        $('.fmb_filter').hide();
        $('.ifr_filter').hide();
        $('.go_filter').hide();
        $('.beic_filter').hide();
        $('.voter_filter').hide();
        $('.vr_const').hide();
        $('.br_filter').hide();

    } else if (doctype == 3) {

        $('.ifr_filter').show();
        $('.voter_filter').hide();
        $('.vr_const').hide();
        $('.osr_filter').hide();
        $('.fmb_filter').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.br_filter').hide();
        $('.doctype').hide();

    } else if (doctype == 4) {

        $('.go_filter').show();
        $('.doctype').show();
        $('.voter_filter').hide();
        $('.vr_const').hide();
        $('.beic_filter').hide();
        $('.ifr_filter').hide();
        $('.osr_filter').hide();
        $('.fmb_filter').hide();
        $('.br_filter').hide();

    } else if (doctype == 5) {

        $('.doctype').show();
        $('.voter_filter').hide();
        $('.vr_const').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.ifr_filter').hide();
        $('.osr_filter').hide();
        $('.fmb_filter').hide();
        $('.br_filter').hide();

    } else if (doctype == 6) {

        $('.beic_filter').show();
        $('.doctype').show();
        $('.voter_filter').hide();
        $('.vr_const').hide();
        $('.go_filter').hide();
        $('.ifr_filter').hide();
        $('.osr_filter').hide();
        $('.fmb_filter').hide();
        $('.br_filter').hide();

    } else if (doctype == 7) {

        $('.voter_filter').hide();
        $('.vr_const').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.ifr_filter').hide();
        $('.osr_filter').hide();
        $('.fmb_filter').hide();
        $('.br_filter').hide();
        $('.doctype').show();

    } else if (doctype == 8) {

        $('.voter_filter').show();
        $('.doctype').show();
        $('.vr_const').show();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.ifr_filter').hide();
        $('.osr_filter').hide();
        $('.fmb_filter').hide();
        $('.br_filter').hide();
        // $('.brauthor').hide();
        // $('.brpublisher').hide();

    } else if (doctype == 9) {

        $('.br_filter').show();
        $('.doctype').show();
        $('.voter_filter').hide();
        $('.vr_const').hide();
        $('.beic_filter').hide();
        $('.go_filter').hide();
        $('.ifr_filter').hide();
        $('.osr_filter').hide();
        $('.fmb_filter').hide();

    } else {

        $('.osr_filter').hide();
        $('#osr-district').val(
            ''); // Here we should clear only value, but here its loading in page on load.
        $('#osr-taluk').html(
            ''); // Here we can clear total html content because its loading in ajax we can rebuild
        $('#osr-village').html('');


        $('.fmb_filter').hide();
        $('#fmb-district').val('');
        $('#fmb-taluk').html('');
        $('#fmb-village').html('');


        $('.ifr_filter').hide();
        $('#ifr-district').val('');
        $('#ifr-taluk').html('');
        $('#ifr-village').html('');

        $('.go_filter').hide();
        $('#go-department-id').val('');

        $('.beic_filter').hide();
        // $('#go-department-id').val('');

        $('.vr_filter').hide();
        $('#vr-district').val('');
        $('#vr-taluk').html('');
        $('#vr-village').html('');

        $('.br_filter').hide();
        $('.brauthor').html('');
        $('.brpublisher').html('');

    }

    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/reports/ajaxdocsubtype/" + doctype,
        method: 'get',
        success: function(data, textStatus) {
            $('#document-subtype-id').html(data);
        }
    });
});


$('#fmb-district').change(function() {

    var fmbdistrict = $('#fmb-district').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/fmb_records/ajaxgettaluks/" +
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
        url: "<?php echo $this->Url->build('/', true)?>admin/fmb_records/ajaxgetvillages/" +
            fmbtaluk,
        method: 'get',
        success: function(data, textStatus) {
            $('#fmb-village').html(data);
        }
    });
});


$('#osr-district').change(function() {
    // alert('Hello');
    var osrdistrict = $('#osr-district').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/osr_records/ajaxgettaluks/" +
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
        url: "<?php echo $this->Url->build('/', true)?>admin/osr_records/ajaxgetvillages/" +
            osrtaluk,
        method: 'get',
        success: function(data, textStatus) {
            $('#osr-village').html(data);
        }
    });
});



$('#ifr-district').change(function() {

    var ifrdistrict = $('#ifr-district').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/ifr_records/ajaxgettaluks/" +
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
        url: "<?php echo $this->Url->build('/', true)?>admin/ifr_records/ajaxgetvillages/" +
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
        url: "<?php echo $this->Url->build('/', true)?>admin/voter_records/ajaxgetdistricts/" +
            vrconstituency,
        method: 'get',
        success: function(data, textStatus) {
            $('#vr-district').html(data);
        }
    });
});

$('#vr-district').change(function() {

    var vrdistrict = $('#vr-district').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/voter_records/ajaxgettaluks/" +
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
        url: "<?php echo $this->Url->build('/', true)?>admin/voter_records/ajaxgetvillages/" +
            vrtaluk,
        method: 'get',
        success: function(data, textStatus) {
            $('#vr-village').html(data);
        }
    });
});

function showyear() {

    $('.year').show();

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
            url: "<?php echo $this->Url->build('/', true)?>admin/book_records/ajaxgetauthors/" +
                doc_subtype,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
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
    //alert('hello');
    var brauthor = $('#brauthor').val();
    $.ajax({
        async: true,
        dataType: "html",
        url: "<?php echo $this->Url->build('/', true)?>admin/book_records/ajaxgetpublishers/" +
            brauthor,
        method: 'get',
        success: function(data, textStatus) {
            //alert(data);
            $('#brpublisher').html(data);
        }
    });
});
</script>