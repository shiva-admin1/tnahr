<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RtiStatusLog[]|\Cake\Collection\CollectionInterface $rtiStatusLogs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rti Status Log'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admin Users'), ['controller' => 'AdminUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin User'), ['controller' => 'AdminUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rti Request Records'), ['controller' => 'RtiRequestRecords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rti Request Record'), ['controller' => 'RtiRequestRecords', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rtiStatusLogs index large-9 medium-8 columns content">
    <h3><?= __('Rti Status Logs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rti_request_record_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rtiStatusLogs as $rtiStatusLog): ?>
            <tr>
                <td><?= $this->Number->format($rtiStatusLog->id) ?></td>
                <td><?= $rtiStatusLog->has('admin_user') ? $this->Html->link($rtiStatusLog->admin_user->name, ['controller' => 'AdminUsers', 'action' => 'view', $rtiStatusLog->admin_user->id]) : '' ?></td>
                <td><?= $rtiStatusLog->has('rti_request_record') ? $this->Html->link($rtiStatusLog->rti_request_record->id, ['controller' => 'RtiRequestRecords', 'action' => 'view', $rtiStatusLog->rti_request_record->id]) : '' ?></td>
                <td><?= $rtiStatusLog->has('status') ? $this->Html->link($rtiStatusLog->status->name, ['controller' => 'Statuses', 'action' => 'view', $rtiStatusLog->status->id]) : '' ?></td>
                <td><?= $this->Number->format($rtiStatusLog->created_by) ?></td>
                <td><?= h($rtiStatusLog->created_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rtiStatusLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rtiStatusLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rtiStatusLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rtiStatusLog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
