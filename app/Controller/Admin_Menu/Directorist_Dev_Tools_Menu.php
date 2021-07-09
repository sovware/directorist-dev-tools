<?php

namespace DirectoristDevToolsAPP\Controller\Admin_Menu;

use DirectoristDevToolsAPP\Helper;
use DirectoristDevToolsAPP\Service\Directorist_UI_Kit;

class Directorist_Dev_Tools_Menu {
    /**
     * Run
     */
    public function run() {
        add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
    }

    public function add_admin_menu() {
        add_menu_page(
            __( 'Directorist Dev Tools', 'directorist-dev-tools' ),
            __( 'Directorist Dev Tools', 'directorist-dev-tools' ),
            'manage_options',
            'directorist-dev-tools',
            [ $this, 'admin_menu_callback' ],
            'dashicons-admin-tools',
            6,
        );

        add_submenu_page(
            'directorist-dev-tools',
            __( 'General', 'directorist-dev-tools' ),
            __( 'General', 'directorist-dev-tools' ),
            'manage_options',
            'directorist-dev-tools',
            [ $this, 'admin_menu_callback' ],
            'dashicons-admin-tools',
        );
    }
    
    public function admin_menu_callback() {
        $tabs = [
            [
                'menu' => 'Page 1',
                'page' => [
                    'content_path' => Helper\Serve::get_template_path( 'admin/general-settings-tab-pages/page-1' ),
                    'data'         => '',
                ],
            ],
            [
                'menu' => 'Page 2',
                'page' => [
                    'content_path' => Helper\Serve::get_template_path( 'admin/general-settings-tab-pages/page-1' ),
                    'data'         => '',
                ],
            ],
        ];

        Directorist_UI_Kit::get_tab_component([
            'tabs' => $tabs,
        ]);
    }
}