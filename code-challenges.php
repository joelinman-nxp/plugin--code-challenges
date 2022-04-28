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
 * Tested up to: 5.9
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

if ( ! defined( 'CC_PLUGIN_FILE' ) ) {
	define( 'CC_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'CC_PLUGIN_URL' ) ) {
	define( 'CC_PLUGIN_URL', untrailingslashit( plugins_url( '/', CC_PLUGIN_FILE ) ) );
}

if ( ! defined( 'CC_PLUGIN_PATH' ) ) {
	define( 'CC_PLUGIN_PATH', untrailingslashit( plugin_dir_path( CC_PLUGIN_FILE ) ) );
}

include_once dirname( CC_PLUGIN_FILE ) . '/includes/installDB.class.php';