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
    }

    // load_css_scripts
    public function load_css_scripts() {
        $new_css_scripts = [];

        $this->css_scrips = $new_css_scripts;
    }

    // load_js_scripts
    public function load_js_scripts() {
        $new_js_scripts = [];

        $this->js_scrips = $new_js_scripts;
    }

    // update_css_scripts
    public function update_css_scripts( $scripts = [] ) {
        return self::merge_scripts( $scripts, $this->css_scrips );
    }

    // update_js_scripts
    public function update_js_scripts( $scripts = [] ) {
        // $this->load_js_scripts();
        return self::merge_scripts( $scripts, $this->js_scrips );
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