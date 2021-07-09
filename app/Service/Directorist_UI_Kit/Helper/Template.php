<?php

namespace DirectoristDevToolsAPP\Service\Directorist_UI_Kit\Helper;

class Template {
    public static function wrap_prifix( $content = '', $echo = true  ) {
        $prefixed_content = "directorist-ui-kit-{$content}";

        if ( ! $echo ) {
            return $prefixed_content;
        }

        echo $prefixed_content;
    }
}