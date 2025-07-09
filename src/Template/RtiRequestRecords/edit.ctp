<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RtiRequestRecord $rtiRequestRecord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rtiRequestRecord->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rtiRequestRecord->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rti Request Records'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Document Types'), ['controller' => 'DocumentTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document Type'), ['controller' => 'DocumentTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Document Subtypes'), ['controller' => 'DocumentSubtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document Subtype'), ['controller' => 'DocumentSubtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Go Departments'), ['controller' => 'GoDepartments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Go Department'), ['controller' => 'GoDepartments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rtiRequestRecords form large-9 medium-8 columns content">
    <?= $this->Form->create($rtiRequestRecord) ?>
    <fieldset>
        <legend><?= __('Edit Rti Request Record') ?></legend>
        <?php
            echo $this->Form->control('document_type_id', ['options' => $documentTypes]);
            echo $this->Form->control('document_subtype_id', ['options' => $documentSubtypes, 'empty' => true]);
            echo $this->Form->control('beic_volume_no');
            echo $this->Form->control('beic_general_no');
            echo $this->Form->control('beic_department');
            echo $this->Form->control('book_title');
            echo $this->Form->control('book_author');
            echo $this->Form->control('book_subject');
            echo $this->Form->control('book_publication_year');
            echo $this->Form->control('book_publisher_name');
            echo $this->Form->control('book_accession_no');
            echo $this->Form->control('book_catalogue_no');
            echo $this->Form->control('bp_no');
            echo $this->Form->control('bp_date', ['empty' => true]);
            echo $this->Form->control('bp_abstract_subject');
            echo $this->Form->control('fmb_district_name');
            echo $this->Form->control('fmb_taluk_name');
            echo $this->Form->control('fmb_village_name');
            echo $this->Form->control('fmb_survey_no');
            echo $this->Form->control('gazettes_notification_no');
            echo $this->Form->control('gazettes_notification_date', ['empty' => true]);
            echo $this->Form->control('gazettes_gpart');
            echo $this->Form->control('gazettes_gsection');
            echo $this->Form->control('go_department_id', ['options' => $goDepartments, 'empty' => true]);
            echo $this->Form->control('go_no');
            echo $this->Form->control('go_date', ['empty' => true]);
            echo $this->Form->control('go_abstract_subject');
            echo $this->Form->control('ifr_district_name');
            echo $this->Form->control('ifr_taluk_name');
            echo $this->Form->control('ifr_village_name');
            echo $this->Form->control('ifr_title_deed_no');
            echo $this->Form->control('osr_district_name');
            echo $this->Form->control('osr_taluk_name');
            echo $this->Form->control('osr_village_name');
            echo $this->Form->control('osr_survey_no');
            echo $this->Form->control('voter_constituency_name');
            echo $this->Form->control('voter_record_year');
            echo $this->Form->control('voter_district_name');
            echo $this->Form->control('voter_taluk_name');
            echo $this->Form->control('voter_village_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
