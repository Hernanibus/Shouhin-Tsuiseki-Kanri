<?php
    /**
     * @var \App\View\AppView $this
     * @var \App\Model\Entity\AdmUser $admUser  User entity set on UserEditCell
     * @var string[]|\Cake\Collection\CollectionInterface $domains Array like of id => denomination for domains set on UserEditCell
     */

    /*
        <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admUser->id), 'class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>

    */


?>
<!-- templates/cell/adm/user/UserEdit/display.php -->

<div class="row">

    <div class="column-responsive column-80">
        <div class="admUsers form content">
            <?= $this->Form->create( $admUser, [ 'url' => [ 'action' => 'edit', $admUser->id ], 'type' => 'post' ] ) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control( 'active', [ 'label' => __( 'active' ), 'type' => 'checkbox' ]);
                    echo $this->Form->control( 'adm_domain_id', [ 'label' => __( 'Domain' ), 'options' => $domains ]);
                    echo $this->Form->control( 'real_family_name', [ 'label' => __( 'Family Name' ) ] );
                    echo $this->Form->control( 'real_name', [ 'label' => __( 'First Name' ) ] );
                    echo $this->Form->control( 'denomination', [ 'label' => __( 'User Name' ) ] );
                    echo $this->Form->control( 'password' );
                    echo $this->Form->control( 'email' );
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

