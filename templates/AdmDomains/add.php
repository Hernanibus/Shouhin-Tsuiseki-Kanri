<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmDomain $admDomain
 * @var \Cake\Collection\CollectionInterface|string[] $admHierarchies
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Adm Domains'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admDomains form content">
            <?= $this->Form->create($admDomain) ?>
            <fieldset>
                <legend><?= __('Add Adm Domain') ?></legend>
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
