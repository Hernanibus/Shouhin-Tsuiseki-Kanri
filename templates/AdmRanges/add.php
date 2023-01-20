<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmRange $admRange
 * @var \Cake\Collection\CollectionInterface|string[] $admHierarchies
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Adm Ranges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admRanges form content">
            <?= $this->Form->create($admRange) ?>
            <fieldset>
                <legend><?= __('Add Adm Range') ?></legend>
                <?php
                    echo $this->Form->control('denomination');
                    echo $this->Form->control('adm_hierarchies._ids', ['options' => $admHierarchies]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
