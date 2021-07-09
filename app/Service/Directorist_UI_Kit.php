<?php

namespace DirectoristDevToolsAPP\Service;

use DirectoristDevToolsAPP\Service\Directorist_UI_Kit\Traits\UI_Helper;

class Directorist_UI_Kit {

    use UI_Helper;

    public function run() {
        $this->register_features();
    }

    /**
     * Get Features
     */
    private function get_features() {
        return [
            Directorist_UI_Kit\Controller\AssetController::class,
        ];
    }

    /**
     * Register Features
     */
    private function register_features() {
        $controllers = $this->get_features();

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

include ( trailingslashit( dirname( __FILE__ ) ) . 'Directorist_UI_Kit/config.php' );