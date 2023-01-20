<?php
    /**
     * @var $params  Array   Associative array of options for the element
     */


    use Cake\Utility\Text;

    echo $this->Html->script( 'elements/buttons', [ 'once' => true ] );

    $_defaults = [
      'caption'         => '< label >',
      'container_body'  => '',
      'visible_class'   => '',
      'hidden_class'    => 'hidden'
    ];
    if( empty( $params ) ){ $params = $_defaults; }
    $params = array_merge( $_defaults, $params );

    $open_button_id = Text::uuid();
    $container_id   = Text::uuid();
    $caption        = $params[ 'caption' ];
    $container_body = $params[ 'container_body' ];
    $hidden_class   = $params[ 'hidden_class' ];
    $visible_class  = $params[ 'visible_class' ];

    $js_params      = '';
    if( $visible_class !== '' ){ $js_params = ",'$visible_class'"; }
    if( $hidden_class !== 'hidden' )
    {
        if( $visible_class !== '' )
            { $js_params .= ",'$hidden_class'"; }
        else
            { $js_params = ",'','$hidden_class'"; }
    }

    $click_2open    = "show_container( '$container_id'$js_params )";
    $click_2close   = "hide_container( '$container_id'$js_params )";

    $this->set( compact( 'open_button_id', 'container_id', 'click_2close' ) );

    $close_button   = $this->element( 'button/close_container' );
?>

<div class="button float-right"  id="<?= $open_button_id ?>" onclick="<?= $click_2open ?>">
    <?= $caption ?>
</div>
<div class="full-maku hidden" id="<?= $container_id ?>">
    <div class="adm-editor-container-row"><?= $close_button ?></div>
    <div class="adm-editor-container"><?= $container_body ?></div>
</div>
