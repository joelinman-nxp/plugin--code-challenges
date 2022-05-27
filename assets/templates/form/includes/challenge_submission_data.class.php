<?php
/**
 * Created by PhpStorm.
 * Filename: challenge_submission_data.class.php
 * User: Joel.Inman
 * Date: 25/05/2022
 * Time: 14:52
 */

if ( ! class_exists( 'Challenge_submission_data', false ) ) :
	
	class Challenge_submission_data {
		
		public function __construct() {
			add_action( 'init', [ $this, 'register_challenge_cpt' ] );
			add_action( 'add_meta_boxes', [ $this, 'create_content_metabox' ] );
		}
		
		//Register New 'challenge' Post Type for form submissions
		public function register_challenge_cpt() {
			if ( ! post_type_exists( 'challenge_sub' ) ) :
				register_post_type( 'challenge_sub', [
					'labels'            => [
						'name'                  => __( 'Challenges', CC_TEXT_DOMAIN ),
						'singular_name'         => __( 'Challenge', CC_TEXT_DOMAIN ),
						'all_items'             => __( 'All Challenges', CC_TEXT_DOMAIN ),
						'menu_name'             => _x( 'Challenges', 'admin menu name', CC_TEXT_DOMAIN ),
						'edit_item'             => __( 'Edit Challenge', CC_TEXT_DOMAIN ),
						'view_item'             => __( 'View Challenge', CC_TEXT_DOMAIN ),
						'view_items'            => __( 'View Challenges', CC_TEXT_DOMAIN ),
						'search_items'          => __( 'Search for a Challenge', CC_TEXT_DOMAIN ),
						'not_found'             => __( 'Challenge Not Found', CC_TEXT_DOMAIN ),
						'not_found_in_trash'    => __( 'Challenge Not Found in Trash', CC_TEXT_DOMAIN ),
						'featured_image'        => __( 'Challenge Image', CC_TEXT_DOMAIN ),
						'set_featured_image'    => __( 'Set Challenge Image', CC_TEXT_DOMAIN ),
						'remove_featured_image' => __( 'Yeet Challenge Image', CC_TEXT_DOMAIN ),
						'use_featured_image'    => __( 'Use as Challenge Image', CC_TEXT_DOMAIN ),
						'filter_items_list'     => __( 'Filter Challenges', CC_TEXT_DOMAIN ),
						'items_list_navigation' => __( 'Challenge Submissions Navigation', CC_TEXT_DOMAIN ),
						'items_list'            => __( 'Challenge Submissions List', CC_TEXT_DOMAIN ),
					],
					'description'       => __( 'Check out all these submitted Challenges', CC_TEXT_DOMAIN ),
					'public'            => false,
					'show_ui'           => true,
					'menu_icon'         => 'dashicons-superhero',
					'capability_type'   => 'post',
					'has_archive'       => false,
					'map_meta_cap'      => true,
					'query_var'         => true,
					'supports'          => [ 'title' ],
					'rewrite'           => _x( 'challenge-submissions', 'slug', CC_TEXT_DOMAIN ) ? [
						'slug'       => _x( 'challenge-submissions', 'slug', CC_TEXT_DOMAIN ),
						'with_front' => false,
						'feeds'      => true
					] : false,
					'show_in_rest'      => true,
					'show_in_nav_menus' => true
				] );
			endif;
		}
		
		// Add new metabox for admin challenge view
		public function create_content_metabox() {
			$submissions = [ 'post-type', 'challenge_sub' ];
			foreach ( $submissions as $submission ) {
				add_meta_box(
					'submitted_challenge',
					__( 'Challenge Form Submissions', CC_TEXT_DOMAIN ),
					[ $this, 'render_metabox_content' ],
					$submission,
					'advanced',
					'high'
				);
			}
		}
		
		// Render content into metabox
		public function render_metabox_content( $post ) {
			$metadata = get_post_meta( $post->ID );
			if ( ! empty( $metadata ) ) :
				foreach ( $metadata as $key => $meta_array ) {
					if ( $key === '_edit_lock' ) :
						continue;
					endif;
					// output challenge details
					echo '<b><h2>' . strtoupper( str_replace( '_', ' ', $key ) ) . ':</b></h2>' . $meta_array[0] . '<br>';
				}
			endif;
		}
	}
	
	return new Challenge_submission_data;

endif;