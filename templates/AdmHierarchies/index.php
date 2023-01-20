<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmHierarchy[]|\Cake\Collection\CollectionInterface $admHierarchies
 */
?>
<div class="admHierarchies index content">
    <?= $this->Html->link(__('New Adm Hierarchy'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Adm Hierarchies') ?></h3>
    <div class="table-responsive">
        <p>
            Should be and editor Showing only the corresponding selected user applications
            based on the hierarchies data.
            When we edit Apps/ranges we are actually editing hierarchies/axes
        </p>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('parent_id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admHierarchies as $admHierarchy): ?>
                <tr>
                    <td><?= $this->Number->format($admHierarchy->id) ?></td>
                    <td><?= $admHierarchy->has('parent_adm_hierarchy') ? $this->Html->link($admHierarchy->parent_adm_hierarchy->id, ['controller' => 'AdmHierarchies', 'action' => 'view', $admHierarchy->parent_adm_hierarchy->id]) : '' ?></td>
                    <td><?= $this->Number->format($admHierarchy->type) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $admHierarchy->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admHierarchy->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admHierarchy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admHierarchy->id)]) ?>
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
