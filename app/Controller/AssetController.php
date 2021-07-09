<?php 

namespace DirectoristDevToolsAPP\Controller;

class AssetController {
    public $css_scrips = [];
    public $js_scrips  = [];
    
    // run
    public function run() {
        add_filter( 'init', [ $this, 'load_css_scripts' ] );
        add_filter( 'init', [ $this, 'load_js_scripts' ] );

        add_filter( 'directorist_js_scripts', [ $this, 'update_js_scripts' ] );
        add_filter( 'directorist_css_scripts', [ $this, 'update_css_scripts' ] );

        add_filter( 'directorist_css_scripts', [ $this, 'update_global_atts_of_css_scripts' ] );
        add_filter( 'directorist_css_scripts', [ $this, 'update_global_atts_of_js_scripts' ] );
    }

    // load_css_scripts
    public function load_css_scripts() {
        $new_css_scripts = apply_filters( 'directorist_dev_tools_css_scripts', [] );

        $this->css_scrips = $new_css_scripts;
    }

    // load_js_scripts
    public function load_js_scripts() {
        $new_js_scripts = apply_filters( 'directorist_dev_tools_js_scripts', [] );;

        $this->js_scrips = $new_js_scripts;
    }

    // update_css_scripts
    public function update_css_scripts( $scripts = [] ) {

        return self::merge_scripts( $scripts, $this->css_scrips );
    }

    // update_js_scripts
    public function update_js_scripts( $scripts = [] ) {

        return self::merge_scripts( $scripts, $this->js_scrips );
    }

    // update_global_atts_of_css_scripts
    public function update_global_atts_of_css_scripts( $scripts = [] ) {
        $global_atts = OptionController::get_option('css_global_atts');

        $global_atts = ( ! empty( $global_atts ) && is_array( $global_atts ) ) ? $global_atts : [];
        $updated_scripts = $scripts;

        foreach ( $updated_scripts as $script_key => $script_args ) {
            $updated_scripts[ $script_key ] = array_merge( $script_args, $global_atts );
        }

        return $updated_scripts;
    }

    // update_global_atts_of_js_scripts
    public function update_global_atts_of_js_scripts( $scripts = [] ) {
        $global_atts = OptionController::get_option('js_global_atts');

        $global_atts = ( ! empty( $global_atts ) && is_array( $global_atts ) ) ? $global_atts : [];
        $updated_scripts = $scripts;

        foreach ( $updated_scripts as $script_key => $script_args ) {
            $updated_scripts[ $script_key ] = array_merge( $script_args, $global_atts );
        }

        return $updated_scripts;
    }

    // merge_scripts
    public static function merge_scripts( $original_scripts = [], $new_scripts = [] ) {
        $updated_scripts = $original_scripts;

        foreach ( $new_scripts as $new_scrips_key => $new_scrips_args ) {
            if ( ! isset( $original_scripts[  $new_scrips_key ] ) ) {
                $updated_scripts[ $new_scrips_key ] = $new_scripts[ $new_scrips_key ];
                continue;   
            }

            $updated_scripts[ $new_scrips_key ] = array_merge( $updated_scripts[ $new_scrips_key ], $new_scrips_args );
        }

        return $updated_scripts;
    }
}