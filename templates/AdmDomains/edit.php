<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmDomain $admDomain
 * @var string[]|\Cake\Collection\CollectionInterface $admHierarchies
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admDomain->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admDomain->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Adm Domains'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admDomains form content">
            <?= $this->Form->create($admDomain) ?>
            <fieldset>
                <legend><?= __('Edit Adm Domain') ?></legend>
                <?php
                    echo $this->Form->control('adm_hierarchy_id', ['options' => $admHierarchies]);
                    echo $this->Form->control('denomination');
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('postcode');
                    echo $this->Form->control('country');
                    echo $this->Form->control('city');
                    echo $this->Form->control('primary_address');
                    echo $this->Form->control('secondary_address');
                    echo $this->Form->control('telephone');
                    echo $this->Form->control('fax');
                    echo $this->Form->control('web');
                    echo $this->Form->control('email');
                    echo $this->Form->control('contact');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
