<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmRange $admRange
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Adm Range'), ['action' => 'edit', $admRange->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Adm Range'), ['action' => 'delete', $admRange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admRange->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Adm Ranges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Adm Range'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admRanges view content">
            <h3><?= h($admRange->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Denomination') ?></th>
                    <td><?= h($admRange->denomination) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($admRange->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Adm Hierarchies') ?></h4>
                <?php if (!empty($admRange->adm_hierarchies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Lft') ?></th>
                            <th><?= __('Rght') ?></th>
                            <th><?= __('Type') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($admRange->adm_hierarchies as $admHierarchies) : ?>
                        <tr>
                            <td><?= h($admHierarchies->id) ?></td>
                            <td><?= h($admHierarchies->parent_id) ?></td>
                            <td><?= h($admHierarchies->lft) ?></td>
                            <td><?= h($admHierarchies->rght) ?></td>
                            <td><?= h($admHierarchies->type) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AdmHierarchies', 'action' => 'view', $admHierarchies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AdmHierarchies', 'action' => 'edit', $admHierarchies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdmHierarchies', 'action' => 'delete', $admHierarchies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admHierarchies->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
