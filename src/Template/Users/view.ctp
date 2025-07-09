<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Otp Logs'), ['controller' => 'OtpLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Otp Log'), ['controller' => 'OtpLogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sms Logs'), ['controller' => 'SmsLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sms Log'), ['controller' => 'SmsLogs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($user->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District Id') ?></th>
            <td><?= $this->Number->format($user->district_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Taluk Id') ?></th>
            <td><?= $this->Number->format($user->taluk_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile Verified') ?></th>
            <td><?= $this->Number->format($user->mobile_verified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($user->is_active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($user->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= $this->Number->format($user->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($user->created_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified Date') ?></th>
            <td><?= h($user->modified_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($user->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Otp Logs') ?></h4>
        <?php if (!empty($user->otp_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Mobile No') ?></th>
                <th scope="col"><?= __('Otp Value') ?></th>
                <th scope="col"><?= __('Otp Expiry') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->otp_logs as $otpLogs): ?>
            <tr>
                <td><?= h($otpLogs->id) ?></td>
                <td><?= h($otpLogs->user_id) ?></td>
                <td><?= h($otpLogs->mobile_no) ?></td>
                <td><?= h($otpLogs->otp_value) ?></td>
                <td><?= h($otpLogs->otp_expiry) ?></td>
                <td><?= h($otpLogs->status) ?></td>
                <td><?= h($otpLogs->created_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OtpLogs', 'action' => 'view', $otpLogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OtpLogs', 'action' => 'edit', $otpLogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OtpLogs', 'action' => 'delete', $otpLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $otpLogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sms Logs') ?></h4>
        <?php if (!empty($user->sms_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sms Text') ?></th>
                <th scope="col"><?= __('Mobile No') ?></th>
                <th scope="col"><?= __('Delivery Status') ?></th>
                <th scope="col"><?= __('Sms Description') ?></th>
                <th scope="col"><?= __('Sms Date') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->sms_logs as $smsLogs): ?>
            <tr>
                <td><?= h($smsLogs->id) ?></td>
                <td><?= h($smsLogs->user_id) ?></td>
                <td><?= h($smsLogs->sms_text) ?></td>
                <td><?= h($smsLogs->mobile_no) ?></td>
                <td><?= h($smsLogs->delivery_status) ?></td>
                <td><?= h($smsLogs->sms_description) ?></td>
                <td><?= h($smsLogs->sms_date) ?></td>
                <td><?= h($smsLogs->created_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SmsLogs', 'action' => 'view', $smsLogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SmsLogs', 'action' => 'edit', $smsLogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SmsLogs', 'action' => 'delete', $smsLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $smsLogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
