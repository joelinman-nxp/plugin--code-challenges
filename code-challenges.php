<?php
/**
 * Code Challenges - 1.0.0
 *
 * Plugin Name: Code Challenges
 * Plugin URI:  https://joelinman.co.uk
 * Description: Enables the WordPress classic editor and the old-style Edit Post screen with TinyMCE, Meta Boxes, etc. Supports the older plugins that extend this screen.
 * Version:     1.0.0
 * Author:      Joel Inman
 * Author URI:  https://joelinman.co.uk
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: code-challenges
 * Requires at least: 4.9
 * Tested up to: 6.0
 * Requires PHP: 7.4
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

defined( 'ABSPATH' ) || exit;

/**
 * DEFINE REQUIRED PATHS & VARIABLES
 */

if ( ! defined( 'CC_PLUGIN_FILE' ) ) {
	define( 'CC_PLUGIN_FILE', __FILE__ );
}
if ( ! defined( 'CC_PLUGIN_URL' ) ) {
	define( 'CC_PLUGIN_URL', untrailingslashit( plugins_url( '/', CC_PLUGIN_FILE ) ) );
}
if ( ! defined( 'CC_PLUGIN_PATH' ) ) {
	define( 'CC_PLUGIN_PATH', untrailingslashit( plugin_dir_path( CC_PLUGIN_FILE ) ) );
}
if ( ! defined( 'CC_PLUGIN_TEMPLATES' ) ) {
	define( 'CC_PLUGIN_TEMPLATES', plugin_dir_path( CC_PLUGIN_FILE ) . 'assets/templates/');
}
if ( ! defined( 'CC_PLUGIN_ASSETS' ) ) {
	define( 'CC_PLUGIN_ASSETS', CC_PLUGIN_URL . '/assets/');
}
if ( ! defined( 'CC_TEXT_DOMAIN' ) ) {
	define( 'CC_TEXT_DOMAIN', 'code-challenges' );
}

/**
 * LOAD ALL SCRIPTS
 */

add_action('wp_enqueue_scripts', 'challenge_enqueue_scripts', 10);

function challenge_enqueue_scripts() {
	wp_enqueue_style('frontend', CC_PLUGIN_ASSETS . 'css/frontend_styles.css');
	wp_enqueue_style('admin', CC_PLUGIN_ASSETS . 'css/admin_styles.css');
	wp_register_script('challenge-form', CC_PLUGIN_ASSETS . 'js/challenge-form.js', ['jquery', 'jquery-form'], false, true);
	wp_localize_script('challenge-form', 'cc_submit_params', ['ajax_url' => 'admin-ajax.php']);
	wp_enqueue_script('challenge-form');
}

require_once CC_PLUGIN_TEMPLATES . 'form/includes/challenge_submission_shortcode.class.php';
require_once CC_PLUGIN_TEMPLATES . 'form/includes/challenge_submission_data.class.php';
require_once CC_PLUGIN_TEMPLATES . 'form/includes/challenge_submission_handler.class.php';