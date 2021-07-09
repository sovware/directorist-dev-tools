<?php

use DirectoristDevToolsAPP\Controller as Controller;
use DirectoristDevToolsAPP\Traits;
final class DirectoristDevTools {

    use Traits\Service_Registrar;

    public static $instance = null;

    /**
     * Constructor
     */
    private function __construct() {
        $this->register_serivces( $this->get_features() );
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
     * Get Features
     */
    private function get_features() {
        return [
            // Services
            Service\Directorist_UI_Kit::class,

            // Controllers
            Controller\Asset_Controller::class,
            Controller\Admin_Menu\Admin_Menu_Controller::class,
        ];
    }
}


function DirectoristDevTools() {
    return DirectoristDevTools::get_instance();
}

DirectoristDevTools();