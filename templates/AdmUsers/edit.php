<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmUser $admUser
 * @var string[]|\Cake\Collection\CollectionInterface $admHierarchies
 * @var string[]|\Cake\Collection\CollectionInterface $admDomains
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admUser->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Adm Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admUsers form content">
            <?= $this->Form->create($admUser) ?>
            <fieldset>
                <legend><?= __('Edit Adm User') ?></legend>
                <?php
                    echo $this->Form->control('active');
                    echo $this->Form->control('adm_hierarchy_id', ['options' => $admHierarchies]);
                    echo $this->Form->control('real_family_name');
                    echo $this->Form->control('real_name');
                    echo $this->Form->control('denomination');
                    echo $this->Form->control('adm_domain_id', ['options' => $admDomains]);
                    echo $this->Form->control('password');
                    echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
