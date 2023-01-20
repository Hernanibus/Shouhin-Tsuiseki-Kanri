<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmApplication $admApplication
 * @var \Cake\Collection\CollectionInterface|string[] $admHierarchies
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Adm Applications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admApplications form content">
            <?= $this->Form->create($admApplication) ?>
            <fieldset>
                <legend><?= __('Add Adm Application') ?></legend>
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
