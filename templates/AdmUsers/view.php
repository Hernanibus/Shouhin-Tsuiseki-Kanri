<?php
/**
 * @var \App\Model\Entity\AdmUser $admUser
 */


    echo $this->Html->css( 'adm/adm' );

    $container_options  = [
        'caption'        => __( 'Edit User' ),
        'container_body' => $this->cell( 'adm/user/UserEdit', [ $admUser->id ] )
    ];

    $edit_button        = $this->element( 'button/show_container', [ 'params' => $container_options ] );

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Form->postButton(__('Back to List'), ['action' => 'index'], [ 'class' => 'button float-right' ]) ?>
            <?= $edit_button ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <td class="admUsers view content">
            <h3><?= h($admUser->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Family Name') ?></th>
                    <td><?= h($admUser->real_family_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($admUser->real_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Name') ?></th>
                    <td><?= h($admUser->denomination) ?></td>
                </tr>
                <tr>
                    <th><?= __('Belongs to Domain') ?></th>
                    <td><?= h( $admUser->adm_domain->denomination ) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($admUser->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $this->Number->format( $admUser->active ) === '1' ? __ ('Active' ) : __( 'Disabled' ); ?></td>
                </tr>
                <tr>
                    <td>
                        <table class="applications-table">
                            <caption><th><?= __('Accepted Rolls') ?></th></caption>
                            <?php foreach( $admUser->user_apps as $app ): ?>
                                <tr>
                                    <td><?= h( $app->denomination ) ?></td>
                                    <?php if( Cake\Core\Configure::read( 'DomainUserControl.useRange' ) ): ?>

                                        <td>
                                            <table>
                                                <caption><th><?= __('Roll Ranges') ?></th></caption>
                                                <tr>
                                                    <td>
                                                        <?php if( is_null( $app->app_ranges ) ): ?>
                                                        --
                                                        <?php elseif ( empty( $app->app_ranges ) ):?>
                                                        None
                                                        <?php else: ?>
                                                        <table>
                                                            <?php foreach( $app->app_ranges as $range ): ?>
                                                            <tr>
                                                                <td><?= h( $range->denomination ) ?></td>
                                                            </tr>
                                                            <?php endforeach;?>
                                                        </table>
                                                        <?php endif;?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    <?php endif;?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
