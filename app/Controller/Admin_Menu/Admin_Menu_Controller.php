<?php

namespace DirectoristDevToolsAPP\Controller\Admin_Menu;

use DirectoristDevToolsAPP\Traits;

class Admin_Menu_Controller {

    use Traits\Service_Registrar;
    
    /**
     * Run
     */
    public function run() {
        $this->register_serivces( $this->get_menus() );
    }

    /**
     * Get Menues
     */
    private function get_menus() {
        return [
            Directorist_Dev_Tools_Menu::class,
        ];
    }
}