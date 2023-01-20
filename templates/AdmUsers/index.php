<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdmUser[]|\Cake\Collection\CollectionInterface $admUsers
 */

?>
<div class="admUsers index content">
    <?= $this->Html->link( __('New User'), ['action' => 'add'], ['class' => 'button float-right'] ) ?>
    <?= $this->Form->postButton( __('Logout'), ['action' => 'logout'], ['class' => 'button float-right', 'style' => 'margin-right:10px'] ) ?>

    <h3><?= __('Users Administration') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __( 'active' ) ?></th>
                    <th><?= __( 'Family Name' ) ?></th>
                    <th><?= __( 'First Name' ) ?></th>
                    <th><?= __( 'User Name' ) ?></th>
                    <th><?= __( 'Domain' ) ?></th>
                    <th><?= __( 'email' ) ?></th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $admUsers as $admUser ): ?>
                <tr>
                    <td><?= $this->Number->format($admUser->active) ?></td>
                    <td><?= h( $admUser->real_family_name ) ?></td>
                    <td><?= h( $admUser->real_name ) ?></td>
                    <td><?= h( $admUser->denomination ) ?></td>
                    <td><?= h( $admUser->adm_domain->denomination ) ?></td>
                    <td><?= h( $admUser->email ) ?></td>
                    <td class="actions">
                        <?= $this->Form->postLink( __('View'), [ 'action' => 'view', $admUser->id ]) ?>
                        <?= $this->Form->postLink( __('Edit'), [ 'action' => 'edit', $admUser->id ]) ?>
                        <?= $this->Form->postLink( __('Delete'), [ 'action' => 'delete', $admUser->id ], ['confirm' => __('Are you sure you want to delete # {0}?', $admUser->id)]) ?>
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
