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
            <?= $this->Html->link(__('List Adm Range Groups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admRangeGroups form content">
            <?= $this->Form->create($admRangeGroup) ?>
            <fieldset>
                <legend><?= __('Add Adm Range Group') ?></legend>
                <?php
                    echo $this->Form->control('denomination');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
