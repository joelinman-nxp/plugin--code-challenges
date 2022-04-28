<?php
/**
 * Created by PhpStorm.
 * Filename: admin.class.php
 * User: Joel.Inman
 * Date: 22/04/2022
 * Time: 12:00
 */

class admin {
	public function __construct() {
		add_action('wp_enqueue_scripts', [$this, 'cc_enqueue_scripts']);
	}
	
	public function cc_enqueue_scripts() {
		wp_enqueue_style('admin_scripts', CC_PLUGIN_URL . '/assets/css/admin_styles.css');
		
		wp_enqueue_script('admin_scripts', CC_PLUGIN_URL . '/assets/js/admin.js');
	}
}
return new admin();