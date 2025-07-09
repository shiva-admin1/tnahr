<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Otp Logs'), ['controller' => 'OtpLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Otp Log'), ['controller' => 'OtpLogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sms Logs'), ['controller' => 'SmsLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sms Log'), ['controller' => 'SmsLogs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('name');
            echo $this->Form->control('mobile_no');
            echo $this->Form->control('email');
            echo $this->Form->control('address');
            echo $this->Form->control('district_id');
            echo $this->Form->control('taluk_id');
            echo $this->Form->control('mobile_verified');
            echo $this->Form->control('is_active');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
            echo $this->Form->control('created_date');
            echo $this->Form->control('modified_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
