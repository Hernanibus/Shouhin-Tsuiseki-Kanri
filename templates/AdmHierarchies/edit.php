<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmHierarchy $admHierarchy
 * @var string[]|\Cake\Collection\CollectionInterface $parentAdmHierarchies
 * @var string[]|\Cake\Collection\CollectionInterface $admApplications
 * @var string[]|\Cake\Collection\CollectionInterface $admRanges
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admHierarchy->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admHierarchy->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Adm Hierarchies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admHierarchies form content">
            <?= $this->Form->create($admHierarchy) ?>
            <fieldset>
                <legend><?= __('Edit Adm Hierarchy') ?></legend>
                <?php
                    echo $this->Form->control('parent_id', ['options' => $parentAdmHierarchies, 'empty' => true, 'label' => 'Parent (Id is fixed always on user edit)']);
                    echo $this->Form->control('type', [ 'label' => 'Type (Fixed for user edit, choose as dropdown on add)' ]);
                    echo $this->Form->control('adm_applications._ids', ['options' => $admApplications, 'label' => 'App Ids (Should show the names for the apps; filtered)']);
                    echo $this->Form->control('adm_ranges._ids', ['options' => $admRanges, 'label' => 'Ranges (Should be shown only if ranges are global/app enabled)']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
