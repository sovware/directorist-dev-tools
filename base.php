<?php

use DirectoristDevToolsAPP\Controller as Controller;
final class DirectoristDevTools {
    public static $instance = null;

    /**
     * Constructor
     */
    private function __construct() {
        $this->register_controllers();
    }

    /**
     * Get The Instance
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new DirectoristDevTools();
        }

        return self::$instance;
    }

    /**
     * Get Controllers
     */
    private function get_controllers() {
        return [
            Controller\AssetController::class,
            Controller\AdminMenuController::class,
        ];
    }

    /**
     * Register Controllers
     */
    private function register_controllers() {
        $controllers = $this->get_controllers();

        foreach ( $controllers as $controller ) {
            if ( ! class_exists( $controller ) ) {
                continue;
            }

            $class = new $controller();

            if ( ! method_exists( $class, 'run' ) ) {
                continue;
            }

            $class->run();
        }
    }
}


function DirectoristDevTools() {
    return DirectoristDevTools::get_instance();
}

DirectoristDevTools();