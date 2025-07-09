<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RtiStatusLog $rtiStatusLog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rti Status Log'), ['action' => 'edit', $rtiStatusLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rti Status Log'), ['action' => 'delete', $rtiStatusLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rtiStatusLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rti Status Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rti Status Log'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admin Users'), ['controller' => 'AdminUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin User'), ['controller' => 'AdminUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rti Request Records'), ['controller' => 'RtiRequestRecords', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rti Request Record'), ['controller' => 'RtiRequestRecords', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rtiStatusLogs view large-9 medium-8 columns content">
    <h3><?= h($rtiStatusLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Admin User') ?></th>
            <td><?= $rtiStatusLog->has('admin_user') ? $this->Html->link($rtiStatusLog->admin_user->name, ['controller' => 'AdminUsers', 'action' => 'view', $rtiStatusLog->admin_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rti Request Record') ?></th>
            <td><?= $rtiStatusLog->has('rti_request_record') ? $this->Html->link($rtiStatusLog->rti_request_record->id, ['controller' => 'RtiRequestRecords', 'action' => 'view', $rtiStatusLog->rti_request_record->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $rtiStatusLog->has('status') ? $this->Html->link($rtiStatusLog->status->name, ['controller' => 'Statuses', 'action' => 'view', $rtiStatusLog->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rtiStatusLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($rtiStatusLog->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($rtiStatusLog->created_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Internal Communication') ?></h4>
        <?= $this->Text->autoParagraph(h($rtiStatusLog->internal_communication)); ?>
    </div>
    <div class="row">
        <h4><?= __('Communication To Applicant') ?></h4>
        <?= $this->Text->autoParagraph(h($rtiStatusLog->communication_to_applicant)); ?>
    </div>
    <div class="row">
        <h4><?= __('Putup Note') ?></h4>
        <?= $this->Text->autoParagraph(h($rtiStatusLog->putup_note)); ?>
    </div>
    <div class="row">
        <h4><?= __('Document Upload') ?></h4>
        <?= $this->Text->autoParagraph(h($rtiStatusLog->document_upload)); ?>
    </div>
</div>
