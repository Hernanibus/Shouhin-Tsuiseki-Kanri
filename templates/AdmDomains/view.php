<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmDomain $admDomain
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Adm Domain'), ['action' => 'edit', $admDomain->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Adm Domain'), ['action' => 'delete', $admDomain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admDomain->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Adm Domains'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Adm Domain'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admDomains view content">
            <h3><?= h($admDomain->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Adm Hierarchy') ?></th>
                    <td><?= $admDomain->has('adm_hierarchy') ? $this->Html->link($admDomain->adm_hierarchy->id, ['controller' => 'AdmHierarchies', 'action' => 'view', $admDomain->adm_hierarchy->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Denomination') ?></th>
                    <td><?= h($admDomain->denomination) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($admDomain->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postcode') ?></th>
                    <td><?= h($admDomain->postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($admDomain->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($admDomain->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Primary Address') ?></th>
                    <td><?= h($admDomain->primary_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Secondary Address') ?></th>
                    <td><?= h($admDomain->secondary_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telephone') ?></th>
                    <td><?= h($admDomain->telephone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fax') ?></th>
                    <td><?= h($admDomain->fax) ?></td>
                </tr>
                <tr>
                    <th><?= __('Web') ?></th>
                    <td><?= h($admDomain->web) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($admDomain->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact') ?></th>
                    <td><?= h($admDomain->contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($admDomain->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($admDomain->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($admDomain->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
