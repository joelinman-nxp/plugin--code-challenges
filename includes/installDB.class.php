<?php
/**
 * Filename: installDB.php
 * User: Joel.Inman
 * Date: 22/04/2022
 * Time: 09:14
 */

/* creates the table/database for the Challenges and User Submissions */

class installDB {
	
	public function __construct() {
		$this->init_hooks();
		// $this->load_admin();
		// $this->load_frontend();
	}
	
	public function init_hooks() {
		add_action( 'after_setup_theme', [ $this, 'install' ] );
	}
	
	// Load Admin Class and Methods
	private function load_admin() {
		if (is_admin()) {
			include_once( '../assets/templates/admin.class.php' );
		}
	}
	
	// Load Frontend Class and Methods
	private function load_frontend() {
		include_once('../assets/templates/frontend.class.php');
	}
	
	public function install() {
		$this->create_table();
	}
	
	private function create_table() {
	
		global $wpdb;
		
		$wpdb->hide_errors();
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		
		dbDelta( $this->get_schema() );
	}
	
	// Define the Table Schema and Keys
	private function get_schema() {
		global $wpdb;
		
		$collate    = '';
		
		if ( $wpdb->has_cap( 'collation' ) ) {
			$collate = $wpdb->get_charset_collate();
		}
		
		$newTables = "	CREATE TABLE IF NOT EXISTS {$wpdb->prefix}code_challenges (

            `ID` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,

            `submitted-by` VARCHAR(50) NOT NULL,

            `submitter-email` VARCHAR(50) NOT NULL,

            `coding-language` VARCHAR(50) NOT NULL,

            `difficulty` INT(1) NOT NULL,

            `challenge-name` VARCHAR(50) NOT NULL,,

            `challenge-overview` VARCHAR(500) NOT NULL,

            `challenge-rules` VARCHAR(250) NOT NULL,

            PRIMARY KEY  (`ID`),

            KEY  `submitted-by` (`submitted-by`(50)),

	    	KEY  `coding-language` (`coding-language`(50)),

	    	KEY  `difficulty` (`difficulty`(1)),

	    	KEY  `challenge-rules` (`challenge-rules`(250))

) $collate;

    	";
		
		return $newTables;
	}
	
}

return new installDB();