<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmHierarchy $admHierarchy
 * @var \Cake\Collection\CollectionInterface|string[] $parentAdmHierarchies
 * @var \Cake\Collection\CollectionInterface|string[] $admApplications
 * @var \Cake\Collection\CollectionInterface|string[] $admRanges
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Adm Hierarchies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admHierarchies form content">
            <?= $this->Form->create($admHierarchy) ?>
            <fieldset>
                <legend><?= __('Add Adm Hierarchy') ?></legend>
                <?php
                    echo $this->Form->control('parent_id', ['options' => $parentAdmHierarchies, 'empty' => true]);
                    echo $this->Form->control('type');
                    echo $this->Form->control('adm_applications._ids', ['options' => $admApplications]);
                    echo $this->Form->control('adm_ranges._ids', ['options' => $admRanges]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
