<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmHierarchy $admHierarchy
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Adm Hierarchy'), ['action' => 'edit', $admHierarchy->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Adm Hierarchy'), ['action' => 'delete', $admHierarchy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admHierarchy->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Adm Hierarchies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Adm Hierarchy'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admHierarchies view content">
            <h3><?= h($admHierarchy->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Parent Adm Hierarchy') ?></th>
                    <td><?= $admHierarchy->has('parent_adm_hierarchy') ? $this->Html->link($admHierarchy->parent_adm_hierarchy->id, ['controller' => 'AdmHierarchies', 'action' => 'view', $admHierarchy->parent_adm_hierarchy->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($admHierarchy->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lft') ?></th>
                    <td><?= $this->Number->format($admHierarchy->lft) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rght') ?></th>
                    <td><?= $this->Number->format($admHierarchy->rght) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $this->Number->format($admHierarchy->type) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Adm Applications') ?></h4>
                <?php if (!empty($admHierarchy->adm_applications)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Denomination') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($admHierarchy->adm_applications as $admApplications) : ?>
                        <tr>
                            <td><?= h($admApplications->id) ?></td>
                            <td><?= h($admApplications->denomination) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AdmApplications', 'action' => 'view', $admApplications->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AdmApplications', 'action' => 'edit', $admApplications->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdmApplications', 'action' => 'delete', $admApplications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admApplications->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Adm Ranges') ?></h4>
                <?php if (!empty($admHierarchy->adm_ranges)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Denomination') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($admHierarchy->adm_ranges as $admRanges) : ?>
                        <tr>
                            <td><?= h($admRanges->id) ?></td>
                            <td><?= h($admRanges->denomination) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AdmRanges', 'action' => 'view', $admRanges->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AdmRanges', 'action' => 'edit', $admRanges->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdmRanges', 'action' => 'delete', $admRanges->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admRanges->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Adm Hierarchies') ?></h4>
                <?php if (!empty($admHierarchy->child_adm_hierarchies)) : ?>
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
                        <?php foreach ($admHierarchy->child_adm_hierarchies as $childAdmHierarchies) : ?>
                        <tr>
                            <td><?= h($childAdmHierarchies->id) ?></td>
                            <td><?= h($childAdmHierarchies->parent_id) ?></td>
                            <td><?= h($childAdmHierarchies->lft) ?></td>
                            <td><?= h($childAdmHierarchies->rght) ?></td>
                            <td><?= h($childAdmHierarchies->type) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AdmHierarchies', 'action' => 'view', $childAdmHierarchies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AdmHierarchies', 'action' => 'edit', $childAdmHierarchies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdmHierarchies', 'action' => 'delete', $childAdmHierarchies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childAdmHierarchies->id)]) ?>
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
