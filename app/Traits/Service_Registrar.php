<?php

namespace DirectoristDevToolsAPP\Traits;

trait Service_Registrar {
    /**
     * Register Serivces
     */
    private function register_serivces( $services = [] ) {

        if ( 'array' !== gettype( $services ) ) {
            return;
        }

        foreach ( $services as $service ) {
            if ( ! class_exists( $service ) ) {
                continue;
            }

            $class = new $service();

            if ( ! method_exists( $class, 'run' ) ) {
                continue;
            }

            $class->run();
        }
    }
}