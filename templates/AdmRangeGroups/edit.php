<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmRangeGroup $admRangeGroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admRangeGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admRangeGroup->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Adm Range Groups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admRangeGroups form content">
            <?= $this->Form->create($admRangeGroup) ?>
            <fieldset>
                <legend><?= __('Edit Adm Range Group') ?></legend>
                <?php
                    echo $this->Form->control('denomination');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
