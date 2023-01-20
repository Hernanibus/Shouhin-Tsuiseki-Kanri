<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmApplication $admApplication
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Adm Application'), ['action' => 'edit', $admApplication->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Adm Application'), ['action' => 'delete', $admApplication->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admApplication->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Adm Applications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Adm Application'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admApplications view content">
            <h3><?= h($admApplication->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($admApplication->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Denomination') ?></th>
                    <td><?= h($admApplication->denomination) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Adm Hierarchies') ?></h4>
                <?php if (!empty($admApplication->adm_hierarchies)) : ?>
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
                        <?php foreach ($admApplication->adm_hierarchies as $admHierarchies) : ?>
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
