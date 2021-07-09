<?php

namespace DirectoristDevToolsAPP\Traits;

trait Template_Helper {
    /**
     * Get Template
     */
    public static function get_template( $template = '', $data = '', $echo = true, $template_base = '' ) {
        $template_content = '';
        $template_base = ( ! empty( $template_base ) ) ? $template_base : DIRECTORIST_DEV_TOOLS_VIEWS;

        $template_path = $template_base . "{$template}.php";

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

    /**
     * Get Template
     */
    public static function get_template_path( $template = '' ) {
        $template_path = DIRECTORIST_DEV_TOOLS_VIEWS . "{$template}.php";

        if ( ! file_exists( $template_path ) ) {
            return '';
        }

        return $template_path;
    }
}