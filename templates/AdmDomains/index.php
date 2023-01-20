<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmDomain[]|\Cake\Collection\CollectionInterface $admDomains
 */
?>
<div class="admDomains index content">
    <?= $this->Html->link(__('New Adm Domain'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Adm Domains') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('adm_hierarchy_id') ?></th>
                    <th><?= $this->Paginator->sort('denomination') ?></th>
                    <th><?= $this->Paginator->sort('company_name') ?></th>
                    <th><?= $this->Paginator->sort('postcode') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('primary_address') ?></th>
                    <th><?= $this->Paginator->sort('secondary_address') ?></th>
                    <th><?= $this->Paginator->sort('telephone') ?></th>
                    <th><?= $this->Paginator->sort('fax') ?></th>
                    <th><?= $this->Paginator->sort('web') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admDomains as $admDomain): ?>
                <tr>
                    <td><?= $this->Number->format($admDomain->id) ?></td>
                    <td><?= $admDomain->has('adm_hierarchy') ? $this->Html->link($admDomain->adm_hierarchy->id, ['controller' => 'AdmHierarchies', 'action' => 'view', $admDomain->adm_hierarchy->id]) : '' ?></td>
                    <td><?= h($admDomain->denomination) ?></td>
                    <td><?= h($admDomain->company_name) ?></td>
                    <td><?= h($admDomain->postcode) ?></td>
                    <td><?= h($admDomain->country) ?></td>
                    <td><?= h($admDomain->city) ?></td>
                    <td><?= h($admDomain->primary_address) ?></td>
                    <td><?= h($admDomain->secondary_address) ?></td>
                    <td><?= h($admDomain->telephone) ?></td>
                    <td><?= h($admDomain->fax) ?></td>
                    <td><?= h($admDomain->web) ?></td>
                    <td><?= h($admDomain->email) ?></td>
                    <td><?= h($admDomain->contact) ?></td>
                    <td><?= h($admDomain->created) ?></td>
                    <td><?= h($admDomain->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $admDomain->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admDomain->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admDomain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admDomain->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
