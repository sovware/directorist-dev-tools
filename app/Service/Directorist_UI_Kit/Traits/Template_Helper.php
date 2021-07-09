<?php

namespace DirectoristDevToolsAPP\Service\Directorist_UI_Kit\Traits;

trait Template_Helper {
    /**
     * Get Template
     */
    public static function get_template( $template = '', $data = '', $echo = true, $template_base = '' ) {
        $template_content = '';
        $template_base    = ( ! empty( $template_base ) ) ? $template_base : DIRECTORIST_UI_KIT_VIEWS;
        $template_path    =  $template_base . "{$template}.php";

        if ( ! file_exists( $template_path ) ) {
            if ( ! $echo ) {
                return $template_content;
            }
    
            echo $template_content; 
            
            return;
        }

        ob_start();
        include( $template_path );
        $template_content = ob_get_clean();

        if ( ! $echo ) {
            return $template_content;
        }

        echo $template_content;
    }
}