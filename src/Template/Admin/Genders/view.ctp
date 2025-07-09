<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gender $gender
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gender'), ['action' => 'edit', $gender->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gender'), ['action' => 'delete', $gender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Genders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gender'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applicants'), ['controller' => 'Applicants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applicant'), ['controller' => 'Applicants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="genders view large-9 medium-8 columns content">
    <h3><?= h($gender->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($gender->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gender->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($gender->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($gender->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($gender->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified On') ?></th>
            <td><?= h($gender->modified_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $gender->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Applicants') ?></h4>
        <?php if (!empty($gender->applicants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Father Name') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Age') ?></th>
                <th scope="col"><?= __('Place Of Birth') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('Alternative Mobile') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('District Id') ?></th>
                <th scope="col"><?= __('Pincode') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Nationality') ?></th>
                <th scope="col"><?= __('Community Id') ?></th>
                <th scope="col"><?= __('Religion Id') ?></th>
                <th scope="col"><?= __('Gender Id') ?></th>
                <th scope="col"><?= __('Qualification Id') ?></th>
                <th scope="col"><?= __('Other Qualification') ?></th>
                <th scope="col"><?= __('Experience') ?></th>
                <th scope="col"><?= __('No Of Days To Join') ?></th>
                <th scope="col"><?= __('Location Preference') ?></th>
                <th scope="col"><?= __('Is Police Case Any') ?></th>
                <th scope="col"><?= __('Info Abt Police Case') ?></th>
                <th scope="col"><?= __('Is Declaration Agreed') ?></th>
                <th scope="col"><?= __('Is Email Verified') ?></th>
                <th scope="col"><?= __('Is Mobile Verified') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col"><?= __('Modified On') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($gender->applicants as $applicants): ?>
            <tr>
                <td><?= h($applicants->id) ?></td>
                <td><?= h($applicants->first_name) ?></td>
                <td><?= h($applicants->last_name) ?></td>
                <td><?= h($applicants->father_name) ?></td>
                <td><?= h($applicants->dob) ?></td>
                <td><?= h($applicants->age) ?></td>
                <td><?= h($applicants->place_of_birth) ?></td>
                <td><?= h($applicants->mobile) ?></td>
                <td><?= h($applicants->alternative_mobile) ?></td>
                <td><?= h($applicants->address) ?></td>
                <td><?= h($applicants->district_id) ?></td>
                <td><?= h($applicants->pincode) ?></td>
                <td><?= h($applicants->email) ?></td>
                <td><?= h($applicants->nationality) ?></td>
                <td><?= h($applicants->community_id) ?></td>
                <td><?= h($applicants->religion_id) ?></td>
                <td><?= h($applicants->gender_id) ?></td>
                <td><?= h($applicants->qualification_id) ?></td>
                <td><?= h($applicants->other_qualification) ?></td>
                <td><?= h($applicants->experience) ?></td>
                <td><?= h($applicants->no_of_days_to_join) ?></td>
                <td><?= h($applicants->location_preference) ?></td>
                <td><?= h($applicants->is_police_case_any) ?></td>
                <td><?= h($applicants->info_abt_police_case) ?></td>
                <td><?= h($applicants->is_declaration_agreed) ?></td>
                <td><?= h($applicants->is_email_verified) ?></td>
                <td><?= h($applicants->is_mobile_verified) ?></td>
                <td><?= h($applicants->is_active) ?></td>
                <td><?= h($applicants->user_id) ?></td>
                <td><?= h($applicants->created_by) ?></td>
                <td><?= h($applicants->created_on) ?></td>
                <td><?= h($applicants->modified_by) ?></td>
                <td><?= h($applicants->modified_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Applicants', 'action' => 'view', $applicants->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Applicants', 'action' => 'edit', $applicants->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applicants', 'action' => 'delete', $applicants->], ['confirm' => __('Are you sure you want to delete # {0}?', $applicants->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
