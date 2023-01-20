<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmRangeGroup $admRangeGroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Adm Range Group'), ['action' => 'edit', $admRangeGroup->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Adm Range Group'), ['action' => 'delete', $admRangeGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admRangeGroup->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Adm Range Groups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Adm Range Group'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admRangeGroups view content">
            <h3><?= h($admRangeGroup->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Denomination') ?></th>
                    <td><?= h($admRangeGroup->denomination) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($admRangeGroup->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
