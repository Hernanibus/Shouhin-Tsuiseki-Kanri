<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmRange $admRange
 * @var string[]|\Cake\Collection\CollectionInterface $admHierarchies
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admRange->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admRange->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Adm Ranges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admRanges form content">
            <?= $this->Form->create($admRange) ?>
            <fieldset>
                <legend><?= __('Edit Adm Range') ?></legend>
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
