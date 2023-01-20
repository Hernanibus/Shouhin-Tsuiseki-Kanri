<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmRange[]|\Cake\Collection\CollectionInterface $admRanges
 */
?>
<div class="admRanges index content">
    <?= $this->Html->link(__('New Adm Range'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Adm Ranges') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('denomination') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admRanges as $admRange): ?>
                <tr>
                    <td><?= $this->Number->format($admRange->id) ?></td>
                    <td><?= h($admRange->denomination) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $admRange->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admRange->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admRange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admRange->id)]) ?>
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
