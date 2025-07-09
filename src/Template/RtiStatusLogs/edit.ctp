<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RtiStatusLog $rtiStatusLog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rtiStatusLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rtiStatusLog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rti Status Logs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admin Users'), ['controller' => 'AdminUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin User'), ['controller' => 'AdminUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rti Request Records'), ['controller' => 'RtiRequestRecords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rti Request Record'), ['controller' => 'RtiRequestRecords', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rtiStatusLogs form large-9 medium-8 columns content">
    <?= $this->Form->create($rtiStatusLog) ?>
    <fieldset>
        <legend><?= __('Edit Rti Status Log') ?></legend>
        <?php
            echo $this->Form->control('admin_user_id', ['options' => $adminUsers]);
            echo $this->Form->control('rti_request_record_id', ['options' => $rtiRequestRecords]);
            echo $this->Form->control('status_id', ['options' => $statuses]);
            echo $this->Form->control('internal_communication');
            echo $this->Form->control('communication_to_applicant');
            echo $this->Form->control('putup_note');
            echo $this->Form->control('document_upload');
            echo $this->Form->control('created_by');
            echo $this->Form->control('created_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
