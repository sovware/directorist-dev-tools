<?php

namespace DirectoristDevToolsAPP\Service\Directorist_UI_Kit\Traits;

trait UI_Helper {

    use Template_Helper;

    public static function get_tab_component( $args = [] ) {
        $default = [
            'tabs'          => [],
            'echo'          => true,
            'template_base' => '',
        ];

        $args = array_merge( $default, $args );
        
        self::get_template( 'tabs/tabs', $args['tabs'], $args['echo'], $args['template_base'] );
    }
}