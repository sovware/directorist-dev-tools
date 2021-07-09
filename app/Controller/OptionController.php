<?php

namespace DirectoristDevToolsAPP\Controller;

class OptionController {
    public static $option_prefix = '_ddt_';
    public static $default_options = [];

    // setup_default_options
    public static function setup_default_options() {
        $default_options = [
            'css_global_atts' => [],
            'js_global_atts'  => [],
        ];

        self::$default_options = apply_filters( 'directorist_dev_tools_default_options', $default_options );
    }

    // get_option
    public static function get_option( $option_key = '' ) {

        if ( isset( self::$default_options[ $option_key ] ) ) { 
            return '';
        }

        self::setup_default_options();

        return get_option( self::$option_prefix . $option_key, self::$default_options[ $option_key ], true );
    }

    // update_option
    public static function update_option( $option_key = '', $value = '' ) {
        
        return update_option( self::$option_prefix . $option_key, $value );
    }

    // delete_option
    public static function delete_option( $option_key = '' ) {
        
        return delete_option( self::$option_prefix . $option_key );
    }
}