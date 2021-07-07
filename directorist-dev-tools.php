<?php
/**
 * Directorist DevTools
 *
 * @package           DirectoristDevTools
 * @author            Sovware
 * @copyright         2021 Sovware
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Directorist DevTools
 * Plugin URI:        https://github.com/sovware/directorist-dev-tools
 * Description:       This plugin adds development tools for debugging Directorist
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sovware
 * Author URI:        https://github.com/sovware
 * Text Domain:       directorist-dev-tools
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined( 'ABSPATH' ) || exit;

include trailingslashit( dirname( __FILE__ ) ) . 'vendor/autoload.php';
include trailingslashit( dirname( __FILE__ ) ) . 'config.php';
include trailingslashit( dirname( __FILE__ ) ) . 'base.php';
